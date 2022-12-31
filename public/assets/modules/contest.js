let contest = {
    init: () => {
        contest.bindEvents();
    },
    bindEvents: () => {
        $(".cnst-card").on("click", (e) => {
            $(".cnst-card").removeClass("activ")
            $(e.delegateTarget).addClass("activ")
            if ($(e.delegateTarget).find('[name="business_name"]').val() === "Small")
            {
                $(".price-label").text("Price (200$ to 599$)");
                $("#contest-price").attr("min", 200);
                $("#contest-price").val(200);
                $("#contest-price").attr("max", 599);
            } else if ($(e.delegateTarget).find('[name="business_name"]').val() === "Medium")
            {
                $(".price-label").text("Price (600$ to 1399$)");
                $("#contest-price").attr("min", 600);
                $("#contest-price").val(600);
                $("#contest-price").attr("max", 1399);
            } else if ($(e.delegateTarget).find('[name="business_name"]').val() === "Big")
            {
                $(".price-label").text("Price (1400$+)");
                $("#contest-price").attr("min", 1400);
                $("#contest-price").val(1400);
                $("#contest-price").removeAttribute("max");
            }
            $(".p-title").text($(e.delegateTarget).find('[name="business_name"]').val());
            $("#business_level").val($(e.delegateTarget).find('[name="business_name"]').val());
        });

        $(".cnstr-select").on("click", () => {
            $("#select-logos-section").css("display", "block");
            $(".cnstr-select").css("display", "none")
        })

        $(".cnstr-next").on("click", (e) => {
            e.preventDefault();
            let imagesArray = [];
            let imageElems = $(".dz-image-preview .dz-image img");
            if ($(imageElems).length > 0) {
                $(imageElems).each(function (index, val) {
                    if (!validURL($(val).attr('src'))){
                        imagesArray[index] = ($(val).attr('src'));
                    }
                });
                imagesArray = JSON.stringify(imagesArray);
                $("#base64_images").val(imagesArray);
            } else if ($(".wrp-block--like.activ").length < 0 ) {
                toastr.error('Please upload at least 1 image or select from list');
                return;
            }
            $("#type-form").submit();
        })

        $(".wrp-block--like").on("click", () => {
            let defaultLogoArr = [];
            $(".wrp-block--like.activ").each((index , node) => {
                defaultLogoArr[index] = $(node).find("[name='default_image_id']").val();
            });
            $("#default_logos").val(defaultLogoArr.join(","))
        });

        let dropzone = new Dropzone('#dropzone-area', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            url: "/upload/files",
            parallelUploads: 2,
            thumbnailHeight: 120,
            thumbnailWidth: 120,
            maxFilesize: 1,
            maxFiles: 3,
            filesizeBase: 1000,
            acceptedFiles: ".jpeg,.jpg,.png",
            thumbnail: function(file, dataUrl) {

                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
                }
                if ($(".dz-image-preview").length < 1) {
                    $(".tg-fileuploadlabel").html(`
                <span>Drop files anywhere to upload</span>
                <span>Or</span>
                <span class="btn btn-common">Select Files</span>
                <span>Maximum upload file size: 1000 KB</span>`
                    );
                }
            },

            maxfilesexceeded: function(file, response) {
                toastr.error("You can only uploads 3 files at a time.");
                this.removeFile(file);
            },

            error: function (file) {
                if (file.size > 1000000) {
                    toastr.error("File size is: "+file.previewElement.innerText+ " Allowed size is 1 MB");
                }
                if (file.previewElement) {
                    this.removeFile(file)
                }
                return;
            },


            removedfile: function (file) {
                if (file.previewElement){
                    $(file.previewElement).remove();
                }
                if ($(".dz-image-preview").length < 1) {
                    $(".append-area").html(
                        `<label class="tg-fileuploadlabel" for="tg-photogallery">
                    <span>Drop files anywhere to upload</span>
                    <span>Or</span>
                    <span class="btn btn-common">Select Files</span>
                    <span>Maximum upload file size: 1000 KB</span>
                </label>`
                    );
                    $(".dropzone-text-area").css('display', 'none');
                    $(".dotted-dropzone").removeAttr('style');
                }
                return;
            },

            success: function (file) {
                console.log('here')
            },

            complete: function(file) {
                if ($(".dz-image-preview").length > 0) {
                    $(".append-area").html('');
                    $("#dropzone-area").css("height", "250px");
                    $(".dropzone-text-area").css('display', 'block');
                    $(".dotted-dropzone").css("border-radius", "8px");
                    $(".dotted-dropzone").css("padding", "10px");
                }
            }

        });

        let minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;

        dropzone.uploadFiles = function(files) {
            var self = this;

            for (var i = 0; i < files.length; i++) {

                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function(file, totalSteps, step) {
                        return function() {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };

                            self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                                //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }
        $(".delete-image").on("click", function (e) {
            $(this).parent().parent().remove();
            let imageValues = [];
            $('.delete-image').each(function(index, node) {
                if (validURL($(node).data('image_src'))) {
                    imageValues[index] = $(node).data('image_id');
                }
            });
            $(".image-values").val(JSON.stringify(imageValues));
            if ($(".dz-image-preview").length < 1) {
                $(".append-area").html(
                    `<label class="tg-fileuploadlabel" for="tg-photogallery">
                    <span>Drop files anywhere to upload</span>
                    <span>Or</span>
                    <span class="btn btn-common">Select Files</span>
                    <span>Maximum upload file size: 1000 KB</span>
                </label>`
                );
                $(".dropzone-text-area").css('display', 'none');
                $(".dotted-dropzone").removeAttr('style');
            }
        });
        function validURL(str) {
            var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
            return !!pattern.test(str);
        }
    }
}

$(document).ready(() => {
    contest.init();
})
