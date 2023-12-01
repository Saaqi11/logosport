@extends('layouts.main')
@section('content')
    <section class="message">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="title-tabs">
                    <div class="tab">
                        <span class="tab-text">Tehnology company</span>
                    </div>
                    <div class="tab  activ">
                        <span class="tab-text">Building company</span>
                    </div>
                </div> --}}
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
                                @foreach ($conversations as $conversation)
                                    <div class="contact">
                                        <img src="images/profile-icon.png" alt="avatar" class="avatar">
                                        <div class="contact-text">
                                            <span class="contact-name">
                                                @php
                                                    $otherUser = $conversation->user1->id === Auth::id() ? $conversation->user2 : $conversation->user1;
                                                @endphp
                                                {{ $otherUser->first_name }} {{ $otherUser->last_name }}
                                            </span>
                                            <span class="contact-message">
                                                Your: Hello! What's up?
                                            </span>
                                        </div>
                                        <span class="contact-date">{{ $conversation->updated_at->format('d.m.y') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="chat-all">
                            <div class="chat-sct">
                                {{-- <div class="row-date">
                                    <span class="chat-date">25 march</span>
                                </div>
                                <div class="row-answer">
                                    <div class="block-text">
                                        <img src="images/chat-img.png" alt="">
                                        <p>Hello! What's up?</p>
                                    </div>
                                    <span class="date-time">19.02.18</span>
                                </div>
                                <div class="row-you">
                                    <div class="contact">
                                        <img src="images/profile-icon.png" alt="avatar" class="avatar">
                                        <div class="contact-text">
                                            <span class="contact-name">
                                                dmitryburnos
                                            </span>
                                            <span class="contact-message">
                                                Your: Hello! What's up?
                                            </span>
                                        </div>
                                    </div>
                                    <span class="time">15:30</span>
                                </div>
                                <div class="row-you">
                                    <div class="contact">
                                        <img src="images/profile-icon.png" alt="avatar" class="avatar">
                                        <div class="contact-text">
                                            <span class="contact-name">
                                                dmitryburnos
                                            </span>
                                            <span class="contact-message">
                                                Your: Hello! What's up?
                                            </span>
                                        </div>
                                    </div>
                                    <span class="time">15:30</span>
                                </div> --}}
                            </div>
                            <div class="chat-sbmt">
                                <form id="messageForm" action="" class="form-messege">
                                    <div class="attach">
                                        <i class="fas fa-paperclip"></i>
                                    </div>
                                    <textarea name="chat" id="area-chat" class="input-chat"></textarea>
                                    <button type="submit" class="btn-chat">Send</button>
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
            $("#messageForm").on("submit", function(e) {
                e.preventDefault();

                // Assume you have these variables available
                var message = $("#area-chat").val();
                var conversationId = /*conversation id here*/ ;
                var userId = /*user id here*/ ;

                // Send the message using AJAX
                $.ajax({
                    url: '/api/send-message',
                    method: 'POST',
                    data: {
                        messageText: message,
                        userId: userId,
                        conversationId: conversationId
                    },
                    success: function(data) {
                        // Message was sent successfully
                        console.log(data);
                        $("#area-chat").val(''); // Clear the textarea
                    },
                    error: function(data) {
                        // An error occurred
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endpush
