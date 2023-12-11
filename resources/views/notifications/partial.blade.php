@foreach ($notifications as $notification)
    <div class="row-ntf">
        <span class="data-ntf">{{ $notification->created_at }}</span>
        <p class="text-ntf">{{ $notification->message }}</p>
    </div>
@endforeach
