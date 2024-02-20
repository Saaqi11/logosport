let contest = {
    init: () => {
        contest.bindEvents();
    },
    bindEvents: () => {
        $(".cnst-card").on("click", (e) => {
            $(".cnst-card").removeClass("activ")
            $(e.delegateTarget).addClass("activ")
            if ($(e.delegateTarget).find('[name="business_name"]').val() === "Small") {
                $(".price-label").text("Price (200$ to 599$)");
                $("#contest-price").attr("min", 200);
                $("#contest-price").val(200);
                $("#contest-price").attr("max", 599);
            } else if ($(e.delegateTarget).find('[name="business_name"]').val() === "Medium") {
                $(".price-label").text("Price (600$ to 1399$)");
                $("#contest-price").attr("min", 600);
                $("#contest-price").val(600);
                $("#contest-price").attr("max", 1399);
            } else if ($(e.delegateTarget).find('[name="business_name"]').val() === "Big") {
                $(".price-label").text("Price (1400$+)");
                $("#contest-price").attr("min", 1400);
                $("#contest-price").val(1400);
                $("#contest-price").removeAttr("max");
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
                    if (!contest.validURL($(val).attr('src'))) {
                        imagesArray[index] = ($(val).attr('src'));
                    }
                });
                imagesArray = JSON.stringify(imagesArray);
                $("#base64_images").val(imagesArray);
            } else if ($(".wrp-block--like.activ").length < 0) {
                toastr.error('Please upload at least 1 image or select from list');
                return;
            }
            $("#type-form").submit();
        })

        $(".add-color").on("click", () => {
            $("#color-section .col:last").before(`<div class="col-lg-3 col-md-6 col-sm-12 col">
                                                            <button class="delete-color"><i class="fas fa-trash"></i></button>
                                                            <div class="color-content">
                                                                <input type="text" class="color-text" value="#4ac420" style="height: 100%">
                                                                <input type="color" class="color-name color-name--f" name="color[]" value="#4ac420" style="height: 100%">
                                                            </div>
                                                        </div>`);
        });

        $(document).on("keyup", ".color-text", (e) => {
            $(e.target).next().val($(e.target).val())
        })

        $(document).on("change", ".color-name", (e) => {
            $(e.target).prev().val($(e.target).val())
        })

        $(document).on("click", ".delete-color", (e) => {
            $(e.target).parents(".col").remove();
        })

        $(".contest-slider").on("click", (e) => {
            let elem = e.target;
            let percentageStyle = $(elem).next().attr("style");
            let perStyleArr = percentageStyle.split(" ");
            let percentage = perStyleArr[1].replace("%;", "")
            $(elem).next().next().val(percentage);
        })

        $("#attach-file").on("click", () => {
            let docFile = $("#doc_file");
            docFile.click();
            docFile.val("");
            let elemName = $("#file-name");
            elemName.hide();
            elemName.text("");
        });

        $("#file-name").on("click", (e) => {
            $(e.target).hide();
            $("#doc_file").val("");
            let elemName = $("#file-name");
            elemName.hide();
            elemName.text("");
            toastr.success("File has been detached.");
        })

        $("#doc_file").on("change", (e) => {
            let fileLocation = $(e.target).val();
            let locationArr = fileLocation.split("\\");
            let fileName = locationArr[locationArr.length - 1];
            let fileExtension = ['doc', 'docx', 'pdf'];
            let elemName = $("#file-name");
            if ($.inArray(fileLocation.split('.').pop().toLowerCase(), fileExtension) === -1) {
                toastr.error("Please attach only doc, docx or pdf file.");
            } else {
                elemName.show();
                elemName.text(fileName);
            }
        });

        $(".brief-save-button").on("click", () => {
            const companyNameField = $("#company_name");
            if (!companyNameField.val()) {
                toastr.error("Please enter a company name.");
                return false; 
            }
            $("#brief-form").submit();
        })

        $("#condition-save-skip").on("click", () => {
            let limit = $('[name="duration"]').val();
            $("#is-payment").val(0);
            if (parseInt(limit) < 7 || parseInt(limit) > 21) {
                toastr.error("Please add duration between 7-21 days!");
                return;
            }

            let today = contest.getTodayDate();
            let startDate = $('[name="start_date"]').val();

            if (contest.compareDate(today, startDate)) {
                toastr.error("Please add date current or future date!");
                return;
            }
            $("#condition-form").submit();
        })

        $(".style-form-save").on("click", () => {
            $("#style-form").submit();
        });

        $(".save-color-content").on("click", () => {
            $("#color-form").submit();
        })

        $(".wrp-block--like").on("click", () => {
            let defaultLogoArr = [];
            $(".wrp-block--like.activ").each((index, node) => {
                defaultLogoArr[index] = $(node).find("[name='default_image_id']").val();
            });
            $("#default_logos").val(defaultLogoArr.join(","))
        });

        if ($("#dropzone-area").length > 0) {
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
                thumbnail: function (file, dataUrl) {

                    if (file.previewElement) {
                        file.previewElement.classList.remove("dz-file-preview");
                        var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                        for (var i = 0; i < images.length; i++) {
                            var thumbnailElement = images[i];
                            thumbnailElement.alt = file.name;
                            thumbnailElement.src = dataUrl;
                        }
                        setTimeout(function () { file.previewElement.classList.add("dz-image-preview"); }, 1);
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

                maxfilesexceeded: function (file, response) {
                    toastr.error("You can only uploads 3 files at a time.");
                    this.removeFile(file);
                },

                error: function (file) {
                    if (file.size > 1000000) {
                        toastr.error("File size is: " + file.previewElement.innerText + " Allowed size is 1 MB");
                    }
                    if (file.previewElement) {
                        this.removeFile(file)
                    }
                    return;
                },


                removedfile: function (file) {
                    if (file.previewElement) {
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

                complete: function (file) {
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

            dropzone.uploadFiles = function (files) {
                var self = this;

                for (var i = 0; i < files.length; i++) {

                    var file = files[i];
                    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                    for (var step = 0; step < totalSteps; step++) {
                        var duration = timeBetweenSteps * (step + 1);
                        setTimeout(function (file, totalSteps, step) {
                            return function () {
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
        }
        $(".delete-image").on("click", function (e) {
            $(this).parent().parent().remove();
            let imageValues = [];
            $('.delete-image').each(function (index, node) {
                if (contest.validURL($(node).data('image_src'))) {
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
    },
    validURL: (str) => {
        var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
            '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
        return !!pattern.test(str);
    },
    compareDate: (from, to) => {
        //Generate an array where the first element is the year, second is month and third is day
        let splitFrom = from.split('-');
        let splitTo = to.split('-');

        //Create a date object from the arrays
        let fromDate = new Date(splitFrom[2], splitFrom[1] - 1, splitFrom[0]);
        let toDate = new Date(splitTo[0], splitTo[1] - 1, splitTo[2]);

        //Return the result of the comparison
        return fromDate > toDate;
    },
    getTodayDate: () => {
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        let yyyy = today.getFullYear();
        return dd + '-' + mm + '-' + yyyy;
    }

}

$(document).ready(() => {
    contest.init();
})

$(".fa-check-circle").on("click", (e) => {
    if ($(e.target).hasClass("activ")) {
        $(e.target).removeClass("activ");
    } else {
        $(e.target).addClass("activ");
    }
    let designers = [];
    $("#selected-designer").html("")
    setTimeout(() => {
        $(".fa-check-circle.activ").each((index, item) => {
            designers[index] = $(item).data("id");
            $("#selected-designer").append(`
                <div class="row">
                    <div class="col-12">
                        <div id="owl-design" class="owl-carousel slider-designer">
                            <div class="design">
                                <img src="{{ asset("images/design-photo.png") }}" alt="" class="design-img">
                                <span class="profile-name">`+ $(item).parents(".designer-block").find(".profile-name").data("name") + `</span>
                                <div class="wrp-info">
                                    <span class="profile-folowers">
                                        `+ $(item).parents(".designer-block").find(".profile-folowers").data("reactions") + `
                                    </span>
                                    <span class="profile-works">
                                        `+ $(item).parents(".designer-block").find(".profile-works").data("works") + ` Works
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `)
        });
        $("#selected-designers-json").val(JSON.stringify(designers));

    }, 50);
});
