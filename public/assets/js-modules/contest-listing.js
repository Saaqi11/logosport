
let contestListing = {
	fetchListing: () => {
		let dataTable = new DataTable('#contest-container', {
			processing: true,
			serverSide: true,
			ajax: {
				url: "/contest-listing/",
				data: function (d) {
					const businessLevel = $($('#business-level').parent('.select').find('[hidden]')[2]).data('value');
					const participants = $($('#sort-by-participants').parent('.select').find('[hidden]')[2]).find('[hidden]').data('value')
					d.business_level = businessLevel ? businessLevel : "";
					d.participants = participants ? participants : "";
					d.contest_price = $('#contest-filter-price').val();
					d.status = $('.status-filter.active-status').data('id')
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
		$('#contest-filter-price').on('change', () => {
			dataTable.ajax.reload();
		})
		$('.select__option').on('click', () => {
			setTimeout(() => {
				dataTable.ajax.reload();
			}, 200);
		})
	},
	activeStatusEvent: () => {
		$(".status-filter").on('click', (e) => {
			$(".status-filter").removeClass("active-status")
			$(e.target).addClass("active-status")
		})
	},
	initializeSlider: () => {
		$(".price-range input").on('input change', (event) => {
			$('#contest-filter-price-value').html("Contest price greater than ("+$(event.target).val()+"$):")
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