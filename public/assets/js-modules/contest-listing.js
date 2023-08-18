
let contestListing = {
	fetchListing: () => {
		$.ajax({
			type: "GET",
			url: "/contest-listing/",
			data: {
				level: $("#business-level").val(),
				sortBy: $("#sort-by").val(),
				minBudget: $("#min-budget").val(),
				maxBudget: $("#max-budget").val(),
				status: $("#contest-status").val(),
			},
			dataType: "JSON",
			cache: false,
			contentType: false,
			success: (response) => {
				let cities = response.cities;
				if (typeof cities !== "undefined" && cities.length > 0) {
					let html = '<option value="" selected="" disabled="" hidden="">Please Choose any</option>';
					$.each(cities, function (index, item) {
						html += '<option value="'+item.id+'">'+item.name+'</option>'
					});
					$("#city").html(html);
				}
			},
			error: (response) => {
				console.log(response)
			}
		});
	},
	activeStatusEvent: () => {
		$(".status-filter").on('click', (e) => {
			$(".status-filter").removeClass("active-status")
			$(e.target).addClass("active-status")
			$("#contest-status").val()
		})
	},
	init: () => {
		contestListing.fetchListing();
		contestListing.activeStatusEvent()
	}
}

$(document).ready(() => {
	contestListing.init();
})