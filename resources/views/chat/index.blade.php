@extends('layouts.main')
@section('content')
    <section class="message">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chat">
                        <div class="chat-sidebar">
                            <div class="chat-message">
                                <div class="wrp-brief">
                                    <div class="select-wrapper">
                                        <i class="fas fa-search"></i>
                                        <input type="text" name="name_search" class="input-brief input-brief--search"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="chat-message-wrapper">
                                    @foreach ($conversations as $key => $conversation)
                                        <div class="contact conversation-content"
                                            data-conversation-id="{{ $conversation->id }}">
                                            <img src="images/profile-icon.png" alt="avatar" class="avatar">
                                            <div class="contact-text">
                                                <span class="contact-name">
                                                    @php
                                                        $otherUser = $conversation->user1->id === Auth::id() ? $conversation->user2 : $conversation->user1;
                                                    @endphp
                                                    {{ $otherUser->first_name }} {{ $otherUser->last_name }}
                                                </span>
                                                <span class="contact-message">
                                                    {{ $conversation->contest->company_name ?? '' }}
                                                </span>
                                            </div>

                                            @if (count($conversation->unReadMessagesCount) > 0)
                                                <span class="unread">
                                                    {{ count($conversation->unReadMessagesCount) }}
                                                </span>
                                            @endif
                                            <span
                                                class="contact-date">{{ $conversation->updated_at->format('d.m.y') }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="chat-all">
                            <div class="chat-sct">

                            </div>
                            <div id="reply-area" class="d-none">
                                <span id="reply-text"></span>
                                <i id="cancel-reply" class="fas fa-times"></i>
                            </div>
                            <div class="uploaded-image-preview d-none">
                                <i class="fas fa-times cancel-image"></i>
                                <img id="uploaded-image" src="#" alt="image preview" />
                            </div>
                            <div class="chat-sbmt d-none">
                                <form id="messageForm" action="" class="form-messege">
                                    <label for="file-upload">
                                        <div class="attach">
                                            <input id="file-upload" type="file" name="file" hidden>
                                            <i class="fas fa-paperclip"></i>
                                        </div>
                                    </label>

                                    <textarea name="chat" id="area-chat" class="input-chat">
                                    </textarea>
                                    <button type="submit" class="btn-chat"><i id="loader"
                                            class=""></i>Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            var currentPage = 1; // keep track of the current page.

            let uploadFile = null;
            let uploadImage = "";
            let activeConversationId;
            const currentUserId = "{{ Auth::id() }}"; // We get this value from Laravel's Auth facade
            const userName =
                "{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"; // We get this value from Laravel's Auth facade


            setTimeout(() => {

                Echo.private(`chat.${currentUserId}`)
                    .listen('SentMessage', (e) => {
                        try {
                            console.log('Received message:', e);

                            const {
                                message,
                                user,
                                conversation_id
                            } = e;

                            if (activeConversationId == conversation_id) {
                                const userName = `${user.first_name} ${user.last_name}`;
                                const messageDate = new Date(message.created_at);
                                const today = new Date();

                                let mins = messageDate.getMinutes();
                                mins = mins < 10 ? '0' + mins : mins;
                                let timeString = messageDate.getHours() + ':' + mins;

                                let messageHTML;
                                if (message.user_id == currentUserId) {
                                    if (message.parent_id) {
                                        messageHTML = sendReply(userName, message.message, timeString,
                                            message.id, message.parentMessage)
                                    } else {
                                        messageHTML = sendMessage(userName, message.message,
                                            timeString);
                                    }
                                } else {
                                    if (message.parent_id) {
                                        messageHTML = receiveReply(userName, message.message,
                                            timeString, message.id, message.parentMessage)
                                    } else {
                                        messageHTML = receiveMessage(userName, message.message,
                                            timeString,
                                            message.id);
                                    }
                                }

                                $(".chat-sct").append(messageHTML);
                                $('.chat-sct').animate({
                                    scrollTop: $(".chat-sct")[0].scrollHeight
                                }, 500);


                                $(`[data-conversation-id="${activeConversationId}"] .unread`).hide();

                                $.ajax({
                                    url: '/chat/read/' + activeConversationId,
                                    method: 'GET',
                                    success: function(response) {

                                    },
                                    error: function(data) {
                                        // An error occurred
                                        console.log(data);
                                    }
                                });
                            } else {
                                console.log('innnnnnnnn');
                                const conversationBlock = $(
                                    `.contact[data-conversation-id="${conversation_id}"]`);
                                const unreadCountElement = conversationBlock.find('.unread');
                                if (unreadCountElement.length > 0) {
                                    unreadCountElement.show();
                                    const currentCount = parseInt(unreadCountElement.text()) || 0;
                                    unreadCountElement.text(currentCount + 1);
                                } else {
                                    // If the element doesn't exist, create it with the initial count of 1
                                    conversationBlock.append('<span class="unread">1</span>');
                                }
                            }
                            const conversationBlock = $(
                                `.contact[data-conversation-id="${conversation_id}"]`);
                            $(".chat-message-wrapper").prepend(conversationBlock);
                            // Update message preview for this conversation
                            conversationBlock.find('.contact-message').text(message.message);

                        } catch (error) {
                            console.error('Error handling notification:', error);
                        }
                    });
            }, 2000);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Event listener for clicking on a conversation
            $('.contact').click(function() {
                activeConversationId = $(this).data('conversation-id');
                $(".chat-sct").empty(); // This will clear the chat section
                $(".chat-sbmt").removeClass('d-none');
                $("#area-chat").val('');

                $(".contact").removeClass("activ");

                // Add 'active' class to the clicked conversation
                $(this).addClass("activ");

                currentPage = 1;

                loadMessages(currentPage);


            });


            $(".chat-sct").on("click", ".reply-button", function() {
                var parent_id = $(this).closest('.row-you').data(
                    'message-id'); // This will now capture the messageId
                var replyText = $(this).siblings('.contact-text').find('.contact-message')
                    .text(); // This should capture the message text


                console.log({
                    parent_id
                }, {
                    replyText
                });

                $("#reply-area").data('parent-id', parent_id);
                $("#reply-text").text(replyText);
                $("#reply-area").removeClass('d-none');
            });

            $("#cancel-reply").click(function() {
                $("#reply-area").removeData('parent-id');
                $("#reply-text").text("");
                $("#reply-area").addClass('d-none');
            });


            $('.chat-sct').scroll(function() {
                if ($(this).scrollTop() == 0) {
                    currentPage++;
                    loadMessages(currentPage);
                }
            });

            function loadMessages(page) {
                const oldScrollHeight = $(".chat-sct").prop('scrollHeight');

                $(`[data-conversation-id="${activeConversationId}"] .unread`).hide();

                $.ajax({
                    url: '/chat/' + activeConversationId + '?page=' + page,
                    method: 'GET',
                    success: function(response) {
                        const data = response.data.data.reverse(); // Reverse the messages array data

                        console.log(data);

                        let messageHTML = '';

                        data.forEach(e => {
                            const userName = `${e.first_name} ${e.last_name}`;
                            const messageDate = new Date(e.updated_at);
                            const today = new Date();

                            console.log({
                                e
                            });
                            let timeString;
                            if (messageDate.toDateString() === today.toDateString()) {
                                let mins = messageDate.getMinutes();
                                mins = mins < 10 ? '0' + mins : mins;
                                timeString = messageDate.getHours() + ':' + mins;
                            } else {
                                // Not today. Convert to your needed format.
                                timeString = messageDate
                                    .toDateString(); // change this to your preferred date format.
                            }
                            if (e.user_id == currentUserId) {
                                if (e.media) {
                                    messageHTML += sendImage(e.media);
                                }
                                if (e.parent_id) {
                                    messageHTML += sendReply(userName, e.message,
                                        timeString, e.id, e.parent_message)
                                } else {
                                    if (e.message) {
                                        messageHTML += sendMessage(userName, e.message,
                                            timeString, e.id)
                                    }
                                }

                            } else {

                                if (e.media) {
                                    messageHTML += receiveImage(e.media);
                                }

                                if (e.parent_id) {
                                    messageHTML += receiveReply(userName, e.message,
                                        timeString, e.id, e.parent_message)
                                } else {
                                    if (e.message) {
                                        messageHTML += receiveMessage(userName, e.message,
                                            timeString, e.id, (e.invite_message &&
                                                data.length == 1))
                                    }
                                }
                            }
                        });

                        $(".chat-sct").prepend(
                            messageHTML); // prepend the old messages into chat section

                        if (page > 1) {
                            // Calculate the new scroll height after adding the messages
                            const newScrollHeight = $(".chat-sct").prop('scrollHeight');

                            // Scroll to keep the user's current view the same, plus the added amount from new messages
                            $(".chat-sct").scrollTop(newScrollHeight - oldScrollHeight);
                        } else {
                            $('.chat-sct').animate({
                                scrollTop: $(".chat-sct")[0].scrollHeight
                            }, 500);
                        }
                    },
                    error: function(data) {
                        // An error occurred
                        console.log(data);
                    }
                });
            }


            $("#messageForm").on("submit", function(e) {
                e.preventDefault();

                console.log({
                    activeConversationId
                });
                // Assume you have these variables available
                var message = $("#area-chat").val();

                var formData = new FormData();
                if (uploadFile) {
                    formData.append('file', uploadFile);
                }
                formData.append('messageText', message);
                formData.append('conversationId', activeConversationId);
                var parentId = $("#reply-area").data('parent-id');

                if (parentId) {
                    formData.append('parentId', parentId);
                }


                $('.btn-chat').attr('disabled', true);
                $('#loader').attr('class', 'fa fa-spinner fa-spin mr-2');


                // Send the message using AJAX
                $.ajax({
                    url: '/chat',
                    method: 'POST',
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(data) {
                        // Message was sent successfully

                        const {
                            id
                        } = data.data;

                        $('.btn-chat').removeAttr('disabled')
                        $('#loader').removeAttr('class');
                        console.log(data);
                        let currentTime = new Date();
                        let hours = currentTime.getHours();
                        let minutes = currentTime.getMinutes();

                        // Pad with '0' if needed to get "HH:MM" format
                        hours = hours < 10 ? '0' + hours : hours;
                        minutes = minutes < 10 ? '0' + minutes : minutes;

                        let timeString = hours + ':' + minutes;

                        console.log(timeString);

                        let messageHTML = '';
                        if (uploadFile) {
                            messageHTML += sendImage(uploadImage);
                        }

                        if (parentId) {
                            messageHTML += sendReply(userName, message, timeString, id, $(
                                "#reply-text").text())
                        } else {
                            if (message) {
                                messageHTML += sendMessage(userName, message, timeString)
                            }
                        }


                        $(".chat-sct").append(messageHTML);
                        $("#area-chat").val(''); // Clear the textarea
                        $('.chat-sct').animate({
                            scrollTop: $(".chat-sct")[0].scrollHeight
                        }, 500);

                        $('#uploaded-image').attr('src', '');
                        $('.uploaded-image-preview').addClass(
                            'd-none'); // Display the preview image
                        $('.chat-sct').removeClass('d-none');

                        uploadImage = '';
                        uploadFile = null;

                        $("#reply-area").removeData('parent-id');
                        $("#reply-text").text("");
                        $("#reply-area").addClass('d-none');

                    },
                    error: function(data) {
                        // An error occurred
                        console.log(data);
                    }
                });
            });

            $('input[name="name_search"]').on("input", function() {
                // get the input value
                var inputValue = $(this).val().toLowerCase();

                // hide or show conversations based on the input value
                $(".conversation-content").each(function() {
                    var contactName = $(this).find('.contact-name').text().toLowerCase();

                    if (contactName.indexOf(inputValue) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            $("#file-upload").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#uploaded-image').attr('src', e.target.result);
                        $('.uploaded-image-preview').removeClass('d-none'); // Display the preview image
                        $('.chat-sct').addClass('d-none');

                        uploadImage = e.target.result;
                    }
                    uploadFile = this.files[0];
                    reader.readAsDataURL(this.files[0]); // Convert the file to data URL
                }
            });

            $(".cancel-image").click(function() {
                $('#uploaded-image').attr('src', '');
                $('.uploaded-image-preview').addClass('d-none'); // Display the preview image
                $('.chat-sct').removeClass('d-none');

                $('.chat-sct').animate({
                    scrollTop: $(".chat-sct")[0].scrollHeight
                }, 500);
            });

            function receiveMessage(userName, message, time, messageId, isFirst = false) {
                return `
                        <div class="row-you" data-message-id="${messageId}">
                            <div class="contact">
                                <img src="images/profile-icon.png" alt="avatar" class="avatar">
                                <div class="contact-text">
                                    <span class="contact-name">
                                        ${userName}
                                    </span>
                                    <span class="contact-message">
                                        ${message}
                                    </span>
                                </div>
                                <span class="reply-button">Reply</span> 
                            </div>
                            <span class="time">${time}</span>
                            ${isFirst ? `<div><i class="far fa-check-circle accept-invitation mt-2" style="color: green; cursor: pointer"></i> 
                                                                    <i class="far fa-times-circle cancel-invitation mt-2" style="color: red; font-size: 28px; cursor: pointer"></i></div>` : ''}
                        </div>
                        `;
            }

            function sendMessage(userName, message, time, messageId) {
                return `
                <div class="row-you d-flex justify-content-end"  data-message-id="${messageId}">
                            <div class="contact">
                                <img src="images/profile-icon.png" alt="avatar" class="avatar">
                                <div class="contact-text">
                                    <span class="contact-name">
                                        ${userName}
                                    </span>
                                    <span class="contact-message">
                                        ${message}
                                    </span>
                                </div>
                                <span class="reply-button">Reply</span> 
                            </div>
                            <span class="time" style="bottom: -14px">${time}</span>
                        </div>`;
            }

            function sendImage(image) {
                return `
                    <div class="row-you d-flex justify-content-end">
                        <img src=${image} style="width:50%; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;" />
                    </div>
                `;
            }

            function receiveImage(image) {
                return `
                    <div class="row-you">
                        <img src=${image} style="width:50%; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;" />
                    </div>
                `;
            }

            function sendReply(userName, message, time, messageId, parentMessage) {
                return `
                            <div class="row-you d-flex justify-content-end" data-message-id="${messageId}">
									<div id="reply">
										<div class="contact" style="background: #b7b3b354;">
                                            <img src="images/profile-icon.png" alt="avatar" class="avatar">
											<div class="">
												<span class="" style="color: #bbb;">
													${parentMessage}
												</span>
											</div>
										</div>
										<div class="contact">
											<img src="images/profile-icon.png" alt="avatar" class="avatar">
											<div class="contact-text">
												<span class="contact-name">
													${userName}  
												</span>
												<span class="contact-message">
													${message}
												</span>
											</div>
                                            <span class="reply-button">Reply</span> 
										</div>
									</div>
                                    <span class="time" style="bottom: -14px">${time}</span>
								</div>`;
            }


            function receiveReply(userName, message, time, messageId, parentMessage) {
                return `
                            <div class="row-you" data-message-id="${messageId}">
									<div id="reply">
										<div class="contact" style="background: #b7b3b354;">
                                            <img src="images/profile-icon.png" alt="avatar" class="avatar">
											<div class="">
												<span class="" style="color: #bbb;">
													${parentMessage}
												</span>
											</div>
										</div>
										<div class="contact">
											<img src="images/profile-icon.png" alt="avatar" class="avatar">
											<div class="contact-text">
												<span class="contact-name">
													${userName}  
												</span>
												<span class="contact-message">
													${message}
												</span>
											</div>
                                            <span class="reply-button">Reply</span> 
										</div>
									</div>
                                    <span class="time" style="bottom: -14px">${time}</span>
								</div>`;
            }

            $(document).on("click", '.accept-invitation', function() {
                const clickedElement = $(this); // Capture 'this' in a variable

                $.ajax({
                    type: "GET",
                    url: "/chat/accept-invitation/" + activeConversationId,
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    success: (response) => {
                        if (response.status) {
                            toastr.success(response.message);
                            clickedElement.hide(); // Use the captured variable here
                            $('.cancel-invitation').hide();
                        } else {
                            toastr.warning(response.message);
                        }
                    },
                    error: (response) => {
                        console.log(response)
                    }
                });
            });

            $(document).on("click", '.cancel-invitation', function() {
                $.ajax({
                    type: "GET",
                    url: "/chat/cancel-invitation/" + activeConversationId,
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    success: (response) => {
                        if (response.status) {
                            toastr.success(response.message);
                            clickedElement.hide(); // Use the captured variable here
                            $('.accept-invitation').hide();
                        } else {
                            toastr.warning(response.message);
                        }
                    },
                    error: (response) => {
                        console.log(response)
                    }
                });
            });

        });
    </script>
@endpush
