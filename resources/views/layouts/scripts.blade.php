<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-validation.min.js') }}"></script>
@if (request()->route()->getPrefix() === 'customer/contest')
    <script src="{{ asset('assets/js-modules/contest.js') }}"></script>
@endif
@if (request()->route()->getPrefix() === '/user')
    <script src="{{ asset('assets/js-modules/profile.js') }}"></script>
@endif
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

@if (request()->route()->action['as'] === 'contest.listing')
    <script src="{{ asset('assets/js-modules/contest-listing.js') }}"></script>
@endif


<script src="{{ asset('assets/js/competition.js') }}"></script>
@if (request()->route()->getPrefix() === '/competition')
    <script src="{{ asset('assets/js/competition-app.min.js') }}"></script>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- <script src="{{ mix('js/bootstrap.js') }}"></script> --}}
{{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}

@vite(['resources/js/app.js'])
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // document.addEventListener("DOMContentLoaded", function() {

    $(document).ready(function() {
        const authUserId = {{ auth()->user()->id ?? null }};
        setTimeout(() => {

            Echo.private(`Notification.${authUserId}`)
                .listen('NewNotification', (e) => {
                    try {
                        console.log('Received notification:', e);
                        var iconPosition = $('#notification-icon').offset();
                        var box = $('#notification-box');
                        box.css({
                            'top': iconPosition.top +
                                20, // Adjust the value based on your layout
                        });

                        // Toggle the visibility of the box
                        box.toggleClass('show');
                        var notificationList = $('#notification-list');

                        notificationList.append('<li>' + e.message +
                            '</li>');
                        // Handle the received data here...
                    } catch (error) {
                        console.error('Error handling notification:', error);
                    }
                });
        }, 2000);



        // Fetch notifications from Laravel controller
        function fetchNotifications() {
            $.ajax({
                url: '/notification/' + authUserId, // Replace with your Laravel route
                method: 'GET',
                success: function(response) {
                    // Display notifications in the modal
                    displayNotifications(response.notifications);
                },
                error: function(error) {
                    console.error('Error fetching notifications:', error);
                }
            });
        }

        // Display notifications in the modal
        function displayNotifications(notifications) {
            var notificationList = $('#notification-list');
            notificationList.empty();

            notifications.forEach(function(notification) {
                notificationList.append('<li>' + notification.message + '</li>');
            });


            if (notifications.length > 10)
            {
                var url = "{{ route('notification.all', ['id' => '__id__']) }}";
                url = url.replace('__id__', authUserId);

                notificationList.append('<li class="border-0 text-center p-0" style="font-size: 13px">' +
                    '<a href="' + url + '">See all Notification</a>' +
                    '</li>');
            } else {
                notificationList.append('<li class="border-0 text-center p-0" style="font-size: 13px">No Notification</li>');
            }
        }

        // Show the notification modal when the icon is clicked
        $('#notification-icon').click(function() {
            fetchNotifications(); // Fetch and display notifications
            var iconPosition = $('#notification-icon').offset();
            var box = $('#notification-box');
            box.css({
                'top': iconPosition.top + 20, // Adjust the value based on your layout
            });

            // Toggle the visibility of the box
            box.toggleClass('show');
        });

        // Hide the notification box when clicking outside of it
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#notification-icon, #notification-box').length) {
                $('#notification-box').removeClass('show');
            }
        });


        function messageCount() {
            $.ajax({
                type: "GET",
                url: "/chat/count",
                dataType: "JSON",
                cache: false,
                contentType: false,
                success: (response) => {
                    if (response.status) {
                        console.log('response.data', response.data);
                        $('.bg-color-message span').text(response.data);
                    }
                },
                error: (response) => {
                    console.log(response)
                }
            });
        }

        messageCount();


        function rewardCount() {
            $.ajax({
                type: "GET",
                url: "/wallet/count",
                dataType: "JSON",
                cache: false,
                contentType: false,
                success: (response) => {
                    if (response.status) {
                        console.log('response.data', response.data);
                        $('.const__prise').text(response.data+"$");
                    }
                },
                error: (response) => {
                    console.log(response)
                }
            });
        }

        rewardCount();
    });
    // });
</script>
