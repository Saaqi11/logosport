@extends('layouts.main')
@section('content')
    <section class="support">
        <div class="row">
            <div class="col offset-lg-2 col-lg-9 col-md-12">
                <form method="post" action="{{ route('submit.support') }}" class="support-form" enctype="multipart/form-data">
                    @csrf
                    <div class="title-ntf">
                        <h2>
                            Support
                        </h2>
                    </div>
                    <label for="theme" class="sprt-label">Theme</label>
                    <input type="text" class="sprt-input" name="theme">
                    <label for="sprt-message" class="sprt-label">Message</label>
                    <div class="wrp-textarea">
                        <textarea name="message" id="sprt-message" class="sprt-message"></textarea>
                        <label for="upload-files" class="attach-file">
                            <input type="file" name="file[]" id="upload-files" multiple hidden>
                            <i class="fas fa-paperclip"></i>
                        </label>
                    </div>
                    <div class="file-attach">
                        <ul class="list-a">

                        </ul>
                    </div>
                    <button type="submit" class="btn-send">Send</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
   document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('upload-files');
    const fileAttachList = document.querySelector('.file-attach .list-a');

    fileInput.addEventListener('change', handleFileUpload);

    function handleFileUpload(event) {
        const files = event.target.files;

        // Clear existing file list
        fileAttachList.innerHTML = '';

        for (const file of files) {
            const listItem = createFileListItem(file);
            fileAttachList.appendChild(listItem);
        }
    }

    function createFileListItem(file) {
        const listItem = document.createElement('li');
        listItem.classList.add('items-a');

        const fileNameLink = document.createElement('a');
        fileNameLink.href = '#';
        fileNameLink.textContent = file.name;

        const removeIcon = document.createElement('a');
        removeIcon.href = '#';
        removeIcon.innerHTML = '<i class="far fa-times-circle"></i>';
        removeIcon.addEventListener('click', () => removeFile(listItem));

        listItem.appendChild(fileNameLink);
        listItem.appendChild(removeIcon);

        // Create a hidden input field to include file information in the form submission
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'uploaded_files[]'; // Use an array to store file data
        hiddenInput.value = file.name; // You can adjust this to include additional file information if needed

        listItem.appendChild(hiddenInput);

        return listItem;
    }

    function removeFile(listItem) {
        const hiddenInput = listItem.querySelector('input[type="hidden"]');
        if (hiddenInput) {
            hiddenInput.remove();
        }

        listItem.remove();
    }

    // Form submission
    const supportForm = document.querySelector('.support-form');
    supportForm.addEventListener('submit', function (event) {
        // Before submitting the form, remove any empty hidden inputs
        const hiddenInputs = supportForm.querySelectorAll('input[type="hidden"]');
        hiddenInputs.forEach((input) => {
            if (!input.value.trim()) {
                input.remove();
            }
        });
    });
});

    </script>
@endpush
