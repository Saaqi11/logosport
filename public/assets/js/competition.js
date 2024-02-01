
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

$(".customer-heart-icon").on("click", (e) => {
    e.preventDefault()
    let status = 0;
    if ($(e.target).hasClass("far")) {
        status = 1
    }
    let dataId = $(e.target).data("id")
    $.ajax({
        type: "GET",
        url: "/competition/save-customer-favourite-work/"+dataId+"/"+status,
        dataType: "JSON",
        cache: false,
        contentType: false,
        success: (response) => {
            if (status === 1) {
                let $slidersBriefSlider = $(e.target).closest('.sliders-brief__slider');
                let $farFaHeartElements = $slidersBriefSlider.find('.far.fa-heart');
                $farFaHeartElements.removeClass('fa');
                $farFaHeartElements.addClass('far');
                $(e.target).addClass("fa")
            } else {
                $(e.target).removeClass("fa")
                $(e.target).addClass("far")
            }
        },
        error: (response) => {
            console.log(response)
        }
    });
})

$(".user-work-reaction").on("click", (e) => {
    e.preventDefault()
    let dataId = $(e.target).data("id")
    let workId = $(e.target).data("workid")
    $.ajax({
        type: "GET",
        url: "/competition/work-reaction/"+dataId+"/"+workId,
        dataType: "JSON",
        cache: false,
        contentType: false,
        success: (response) => {
			var currentReactionCount = parseInt($(".reaction-count span").text());
			if ($(e.target).hasClass("far")) {
				$(e.target).removeClass("far")
                $(e.target).addClass("fa")

				var newReactionCount = currentReactionCount + 1;
				$(".reaction-count span").text(newReactionCount);
			} else {
				var newReactionCount = currentReactionCount - 1;
				$(".reaction-count span").text(newReactionCount);

				$(e.target).removeClass("fa")
                $(e.target).addClass("far")
			}
        },
        error: (response) => {
            console.log(response)
        }
    });
})

$(".cabinet-slider-images-view").click((e) => {
	let dataId = $(e.target).parents(".cabinet-slider-images-view").data("id")
	$.ajax({
		type: "GET",
		url: "/competition/get-winner-works/"+dataId,
		dataType: "JSON",
		cache: false,
		contentType: false,
		success: (response) => {
        
		$(".slider-info").html(response.sliderContent);


		},
		error: (response) => {
			console.log(response)
		}
	});
});

$(".winners-slider-images-view").click((e) => {
	let dataId = $(e.target).parents(".winners-slider-images-view").data("id")
	$.ajax({
		type: "GET",
		url: "/competition/get-winner-works/"+dataId,
		dataType: "JSON",
		cache: false,
		contentType: false,
		success: (response) => {
        
		$(".slider-info").html(response.sliderContent);


		},
		error: (response) => {
			console.log(response)
		}
	});
});

$('.prf-title a').click(function (e) {
	e.preventDefault(); // Prevent the default action of the hyperlink
	console.log('Hyperlink clicked!');
	// If you want to redirect to the href of the clicked hyperlink, you can use window.location.href
	window.location.href = $(this).attr('href');
});

$(document).on('click', '.cancel-info-btn', function() {
	$(".slider-info").html('');
	// Add code to close the popup or modal here
 });

// $(".winners-slider-images-view").click((e) => {
//     $("#myModal").modal("show")
// 	let dataId = $(e.target).parents(".card-view__top").find('.winners-slider-images-view').data("id");
// 	$.ajax({
// 		type: "GET",
// 		url: "/competition/get-winner-works/"+dataId,
// 		dataType: "JSON",
// 		cache: false,
// 		contentType: false,
// 		success: (response) => {
//             let html = `<div class="carousel-inner">`;
//             let appURL = $("#appURL").val()+"/";
//             if (response.files.length > 0) {
//                 response.files.map((file) => {
//                     html += `
//             <div class="carousel-item ${response.files[0].id === file.id ? "active" : ""}">
//                 <img class="d-block w-100" src="${appURL+file.src}" alt="">
//             </div>
//         `;
//                 });
//             }
//             html += `</div>`;
//             $("#workCarousel").html(html);
//             $("#customer-name").text(response.contest.customer.first_name + " " + response.contest.customer.last_name)
//             $("#company_about").text(response.contest.company_about)
//             $("#company_name").text(response.contest.company_name)
//             $("#designer-name").text(response.designer.first_name + " " + response.designer.last_name)
//             $("#behance").href(response.designer.behance)
//             $("#dribble").href(response.designer.dribble)

//             $('#workCarousel').carousel();
// 		},
// 		error: (response) => {
// 			console.log(response)
// 		}
// 	});
// });
$(document).ready(function(){
	let winnersLength = $(".cabinet-slider-images-view").length
	if (winnersLength < 1) {
		$("#cabinet-portal").html("<p>There is not any work available.</p>")
		$("#cabinet-works-count").html("0 ")
	}

	$('.delete-work').on('click', function () {
		itemIdToDelete = $(this).data('item-id');
		$('#deleteConfirmationModal').modal('show');
	});

	$('#update-image').on('show.bs.modal', function (event) {
		var fileId = event.relatedTarget.dataset.itemId;
		var formAction = $('#update-image-form').data('action').replace('FILE_ID_PLACEHOLDER', fileId);
		console.log({ formAction });

		// Set the updated form action to the url attribute
		$('#update-image-form').attr('url', formAction);
		// $('#update-image-form').attr('action', formAction);
	});

	$('#update-image-form').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        var form = $(this);
		console.log(form.data('action'));
		var formAction = $(this).attr('url');
		var formData = new FormData(form[0]);

        $.ajax({
            type: 'POST',
            url: formAction,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                var fileId = response.fileId;
				var updatedImageUrl = response.updatedImageUrl;

				// Close the modal or handle the response as needed
				$('#update-image').modal('hide');

				// Update the image in the list (assuming each image has a unique data-item-id)
				$('.sliders-brief__slide[data-item-id="' + fileId + '"] img').attr('src', updatedImageUrl);
				$('#update-image-form')[0].reset();
				$("#show-name").html('Upload file <br>(.png)');
            },
            error: function (error) {
                // Handle error response
                console.error('Error updating work:', error.responseText);
            }
        });
    });

	$('#confirmDeleteWork').on('click', function () {

		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		// Make Ajax call to delete the item
		$.ajax({
			type: 'DELETE',
			url: '/competition/delete-work-file/'+itemIdToDelete, // Replace with your server-side script
			dataType: "JSON",
			cache: false,
			contentType: false,
			success: function (response) {
				// Handle success (e.g., remove the item from the UI)
				$('#deleteConfirmationModal').modal('hide');
				// Remove the item from the UI (example assumes list item has an ID)
				if (response.success) {
					$('.sliders-brief__slide').each(function () {
						var currentItemId = $(this).find('.delete-work').data('item-id');
						if (currentItemId === itemIdToDelete) {
							var $deletedElement = $(this);

							// Slide up the element
							$deletedElement.slideUp('slow', function () {
								// Remove the element from the DOM
								$deletedElement.remove();

								// Optionally, animate the container height adjustment
								$('.sliders-brief__wrapper').animate({
									height: $('.sliders-brief__wrapper').height() - $deletedElement.outerHeight(true)
								}, 'slow');
							});
							toastr.success(response.message);
							return false; // Exit the loop after removing the element
						}
					});
				} else {
					toastr.error(response.message);
				}
			},
			error: function (error) {
				alert(error);
				console.error('Error deleting item:', error);
				// Handle error if needed
			}
		});
	});

	$(document).ready(function() {
        $('.winner-file').change(function() {
            var inputId = $(this).attr('id');
            uploadWorkFile(inputId);
        });
    });

	function uploadWorkFile(inputId) {
        const fileInput = $('#' + inputId);
        const file = fileInput[0].files[0];

		const id = window.location.pathname.split('/')[3];
		console.log({ file });

		const closestParent = fileInput.closest('[class]').attr('class').split(' ');
		const keyClass = closestParent[1];
		const indexClass = closestParent[2];
        var formData = new FormData();
        formData.append('file', file);
        formData.append('id', id);
        formData.append('key_class', keyClass);
        formData.append('index_class', indexClass);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        $.ajax({
            url: '/competition/upload-work', // Replace with your actual endpoint
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                // Assuming your server returns the file name
                var fileName = data.file_name;

				window.location.reload();
                // // Update the text inside the span with the file name
                // $('#' + inputId).siblings('span').text(fileName);
				// $(this).parent().contents().filter(function() {
				// 	return this.nodeType === 3; // Filter out text nodes
				// }).remove();
            },
            error: function (error) {
                console.log('Error uploading file: ', error);
            }
        });
    }

	$('.request-work').on('click', function () {
		// const id = $(this).data('id');
		// const type = $(this).data('type');
		// console.log({ id} , { type });

		console.log(" adas asd ");

		$('#sendRequestWorkModal').modal('show');
	});


	$(".invite-designer").on("click", function() {
		const userId = $(this).data('userid');
		const contestId = $(this).data('contestid');

		$.ajax({
			type: "GET",
			url: "/customer/contest/invitaion/"+contestId+"/"+userId,
			dataType: "JSON",
			cache: false,
			contentType: false,
			success: (response) => {
				if (response.status) {
					toastr.success(response.message);
				} else {
					toastr.warning(response.message);
				}
			},
			error: (response) => {
				console.log(response)
			}
		});
	});
})
