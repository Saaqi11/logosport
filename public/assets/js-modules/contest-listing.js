
let contestListing = {
	fetchListing: () => {
		var dataTable = new DataTable('#contest-container', {
			processing: true,
			serverSide: true,
			ajax: {
				url: "/contest-listing/",
				data: function (d) {
					d.business_level = $('#business-level').val();
				}
			},
			columns: [
				{ data: 'html', name: 'html' }
			],
			drawCallback: function(settings) {
				$('#contest-container_paginate .previous').html('<i class="fas fa-chevron-left"></i>')
				$('#contest-container_paginate .next').html('<i class="fas fa-chevron-right"></i>')
			},
			language: {
				lengthMenu: 'Show Contests Per Page  &nbsp; &nbsp; _MENU_',
				search: 'Search By Company Name &nbsp; &nbsp;'
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
	initializeSlider: () => {
		$(".price-range input").on('input change', (event) => {
			$('#contest-filter-price-value').html("Contest Price ("+$(event.target).val()+"$):")
		});
	},
	init: () => {
		contestListing.fetchListing();
		contestListing.activeStatusEvent()
		contestListing.initializeSlider()
	}
}

$(document).ready(() => {
	contestListing.init();
})