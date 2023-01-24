$(".btn-danger").on("click", () => {
    $("#delete-account").show();
})
$(".close-modal").on("click", () => {
    $("#delete-account").hide();
})
$("#country").on("change", (e) => {
    let countryId = $(e.target).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: "/get-city/"+countryId,
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
})
$(".designer-fields").on("keyup paste change", function (e) {
    let check = validURL($(e.target).val());
    if(!check) {
        $(e.target).next().text("Please enter a valid URL");
    } else {
        $(e.target).next().text("");
    }
})
function validURL(str) {
    let pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    return !!pattern.test(str);
}
