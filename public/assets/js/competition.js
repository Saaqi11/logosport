
$("#upload-work").on("change", (e) => {
	$("#show-name").text($(e.target).prop('files')[0]['name']);
});
$("#show-name").on("click", () => {
	$("#upload-work").click();
})

$(".fa-times-circle").on("click", (e) => {
	$(e.target).prev().removeClass("activ");
	let status = 0;
	if ($(e.target).hasClass("active")) {
		$(e.target).removeClass("active");
	} else {
		status = 2;
		$(e.target).addClass("active");
	}
	updateWorkStatus(status, $(e.target).parent().attr("data-id"));
})
$(".fa-check-circle").on("click", (e) => {
	$(e.target).next().removeClass("active");
	let status = 0;
	if ($(e.target).hasClass("activ")) {
		$(e.target).removeClass("activ");
	} else {
		status = 1;
		$(e.target).addClass("activ");
	}
	updateWorkStatus(status, $(e.target).parent().attr("data-id"));
});
function updateWorkStatus (status, id) {
	$.ajax({
		type: "GET",
		url: "/competition/change-work-status/"+id+"/"+status,
		dataType: "JSON",
		cache: false,
		contentType: false,
		success: (response) => {
			if (response && status === 0) {
				toastr.success("The work status has been updated to Pending Status");
			} else if (response && status === 1) {
				toastr.success("The work status has been updated to Second Round");
			} else {
				toastr.success("The work status has been updated to declined");
			}
		},
		error: (response) => {
			console.log(response)
		}
	});
}

$(".choose-position").on("click", (e) => {
	e.preventDefault();
	if ($(e.target).hasClass("active-position")) {
		return;
	}
	let position = $(e.target).data('position');
	let id = $(e.target).data('work_id');
	let contest_id = $(e.target).data('contest_id');
	if(window.confirm('Do you confirm?'))
	{
		$.ajax({
			type: "GET",
			url: "/competition/declare-position/"+id+"/"+position+"/"+contest_id,
			cache: false,
			contentType: false,
			success: (response) => {
				if (response.status) {
					toastr.success(response.message)
					$(e.target).addClass("active-position");
					return;
				}
				toastr.error(response.message)
			},
			error: (response) => {
				console.log(response)
			}
		});
	}
});
$.ajax({
	type: "GET",
	url: "/competition/get-current-user-works/"+window.location.href.split('/')[window.location.href.split('/').length - 1],
	cache: false,
	contentType: false,
	success: (response) => {
		if (response.status) {
			if (response.work.files.length) {
				$("#designer-works").text(response.work.files.length ? response.work.files.length : "0")
			} else {
				$("#designer-works").text("0")
			}
		}
	},
	error: (response) => {
		console.log(response)
	}
});

$("#all-works").on("click", (e) => {
	$.ajax({
		type: "GET",
		url: "/competition/get-all-works/"+$(e.target).data("id"),
		cache: false,
		dataType: "json",
		contentType: false,
		success: (response) => {
			manageResponse(response, e);
		},
		error: (response) => {
			console.log(response)
		}
	});
});

$("#declined-works").on("click", (e) => {
	$.ajax({
		type: "GET",
		url: "/competition/get-declined-works/"+$(e.target).data("id"),
		cache: false,
		dataType: "json",
		contentType: false,
		success: (response) => {
			manageResponse(response, e);
		},
		error: (response) => {
			console.log(response)
		}
	});
});

function manageResponse (response, e) {
	if (response.status && response.works.length > 0) {
		let html = "";
		Object.values(response.works).map((work,key) => {
			html += `
                        <div class="card-view">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="${public_path}images/img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture>
                                        <source srcset="${public_path}images/img/other-img/logo.webp"" type="image/webp">
                                        <img src="${public_path}images/img/other-img/logo.jpg" alt="">
                                    </picture>
                                </div>
                            </div>
                            <div class="card-view__info">
                                <div class="card-view__avatar-ibg">
                                    <picture>
                                        <source srcset="${public_path}images/img/other-img/avatar.webp" type="image/webp">
                                        <img src="${public_path}images/img/other-img/avatar.png" alt="">
                                    </picture>
                                </div>
                                <div class="card-view__info-author">
                                    <div class="card-view__name">
                                        ${work.designer.first_name+" "+work.designer.last_name}
                                    </div>
                                    <div class="card-view__items">
                                        <div class="card-view__item">
                                            <i class="fa fa-heart"></i>
                                            <span>
												${work.reactions ? work.reactions : 0}
											</span>
                                        </div>
                                        <div class="card-view__item">
                                            <span> ${work.total_works.length} works </span>
                                        </div>
                                    </div>
                                </div>`;

			if (response.contest.user_id === user_id) {
				html +=
					`
							<div class="card-view__item" data-id="${work.id}" style="cursor: pointer; display: flex; position: absolute; left: 250px; font-size: 28px; color: #e6e6e6;">
								<i class="far fa-check-circle ${work.status === 1 ? "activ" : ""}"></i>
								<i class="far fa-times-circle ${ work.status === 2 ? "active" : "" }"></i>
							</div> `;
			}

			html += `</div>
                        </div>`;
		});
		$("#works-section").html(html)
	} else {
		$("#works-section").html("<h3>There is not any work available at the moment.</h3>")
	}
	$(".filter__link").removeClass("active")
	$(e.target).addClass("active")
}
$('.sort-by').on("click", (e) => {
	if ($(e.target).val()) {
		$.ajax({
			type: "GET",
			url: "/competition/sort-works/"+$(e.target).data("id"),
			cache: false,
			dataType: "json",
			contentType: false,
			data: {
				sortBy: $(e.target).val(),
				workTypeFilter: $(".filter__link.active").attr("id")
			},
			success: (response) => {
				manageResponse(response, e);
			},
			error: (response) => {
				console.log(response)
			}
		});
	}
})

$(".winners-slider-images-view").click((e) => {
	let dataId = $(e.target).parents(".card-view__top").find('.winners-slider-images-view').data("id");
	$.ajax({
		type: "GET",
		url: "/competition/get-winner-works/"+dataId,
		dataType: "JSON",
		cache: false,
		contentType: false,
		success: (response) => {
		},
		error: (response) => {
			console.log(response)
		}
	});
});
