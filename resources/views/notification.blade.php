@extends('layouts.main')
@section('content')
    <section class="notification">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6 offset-lg-3">
                    <div class="ntf">
                        <div class="title-ntf">
                            <h2>Notification</h2>
                        </div>

                        <div class="block-ntf" id="notification-container">
                            @foreach ($notifications as $notification)
                                <div class="row-ntf">
                                    <span class="data-ntf">{{ $notification->created_at }}</span>
                                    <p class="text-ntf">{{ $notification->message }}</p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Loading indicator -->
                        <div id="loading-indicator" style="display: none;">
                            Loading...
                        </div>

                        <!-- Loading indicator -->
                        <div id="load-more-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        let nextPageUrl = "{{ $notifications->nextPageUrl() }}"; // Laravel pagination URL

        function debounce(func, wait, immediate) {
            let timeout;
            return function() {
                const context = this,
                    args = arguments;
                const later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                const callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        }

        // Your scroll event handler with debounce
        const handleScroll = debounce(function() {
            if ($(window).scrollTop() + $(window).height() >= $('#load-more-placeholder').offset().top) {
                if (nextPageUrl !== null) {
                    // Show loading indicator
                    $('#loading-indicator').show();

                    $.ajax({
                        url: nextPageUrl,
                        method: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // Append new notifications to the container
                            $('#notification-container').append(response.html);

                            // Hide loading indicator
                            $('#loading-indicator').hide();

                            nextPageUrl = response.nextPageUrl;
                        },
                        error: function(xhr) {
                            console.error('Error fetching more data:', xhr);

                            // Hide loading indicator in case of an error
                            $('#loading-indicator').hide();
                        }
                    });
                }
            }
        }, 100); // Adjust the debounce delay (in milliseconds) as needed

        // Attach the scroll event listener
        $(window).on('scroll', handleScroll);
    </script>
@endpush
