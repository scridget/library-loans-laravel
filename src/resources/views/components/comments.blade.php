Comments
<div class="list-group">
    @foreach ($comments as $comment)
        <div class="list-group-item list-group-item-action flex-column align-items-start">
            <p class="mb-1">{{ $comment->body }}</p>
            <div class="d-flex w-100 justify-content-between">
                <small>Comment by {{ $comment->user->name }}</small>
                <small>{{ $comment->created_at->format('n/d/y h:i A') }}</small>
            </div>
        </div>
    @endforeach
</div>