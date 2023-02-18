$(".btn-danger").on("click", (e) => {
    e.preventDefault();
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
$(".st-done").on("click", (e) => {
    if ($(e.target).parent().hasClass("activ")) {
        $(e.target).parent().removeClass("activ");
    } else {
        $(e.target).parent().addClass("activ")
    }
});
$('#notification_form').on('submit', function(e) {
    e.preventDefault();
    let jsonData = {
        active: "",
        inactive: ""
    }
    $(".st-done").each(function(index, item){
        if($(item).hasClass("activ")) {
            jsonData['active'] += $(item).data("id")+",";
        } else {
            jsonData['inactive'] += $(item).data("id")+","
        }
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: '/user/notification/update',
        data: {notification_json: JSON.stringify(jsonData)},
        success: function( msg ) {
            toastr.success(msg);
        },
        error: function( msg ) {
            toastr.error(msg);
        }
    });
});

$("#image-1").on('click', function (e) {
    $("#first_image").click()
});

$("#image-2").on('click', function (e) {
    $("#second_image").click()
});

function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let elem;
            if($(input).attr("id") === "first_image") {
                elem = "#image-1"
            } else if($(input).attr("id") === "second_image") {
                elem = "#image-2"
            }
            $(elem).css('background-image', "url('"+e.target.result+"')");
            $(elem).css('background-size', "cover");
            $(elem).css('background-repeat', "no-repeat");
            $(elem).css('background-position', "center");
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#first_image").change(function(){
    $("#image-1").html("")
    readURL(this);
});
$("#second_image").change(function(){
    $("#image-2").html("")
    readURL(this);
});
$("#verification-form").on("submit", (e) => {
    e.preventDefault();
    if (!$("#first_image").val()) {
        toastr.error("Please upload both images first.")
        return;
    }
    if (!$("#second_image").val()) {
        toastr.error("Please upload both images first.")
        return;
    }
    $("#verification-form").submit();

})
