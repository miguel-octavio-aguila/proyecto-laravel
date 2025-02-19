<div class="card-body">
                    
    <!-- show the image -->
    <div class="card-header">
        @if($image->user->image)
        <div class="container-avatar">
            <img src="{{ route('user.avatar',['filename'=>$image->user->image]) }}" class="avatar">
        </div>
        @endif
        <div class="data-user">
            <a href="">
                {{ $image->user->name.' '.$image->user->surname }}
                <span class="nickname">
                    {{ ' | @'.$image->user->nick }}
                </span>
            </a>
        </div>
    </div>

    <!-- show the image -->
    <div class="image-container">
        <img src="{{ route('image.file',['filename'=>$image->image_path]) }}">
    </div>

    <!-- show the description -->
    <div class="description">
        <span class="nickname">{{ '@'.$image->user->nick }}</span>
        <span class="nickname date">{{ ' | '.\FormatTime::formatTime($image->created_at) }}</span>
        <p>{{ $image->description }}</p>
    </div>

    <!-- show the likes -->
    <div class="likes">
        <!-- check if the user liked the image -->
        <?php $user_like = false; ?>
        @foreach($image->likes as $like)
            @if($like->user->id == Auth::user()->id)
            <?php $user_like = true; ?>
            @endif
        @endforeach

        @if($user_like)
            <img src="{{ asset('img/heart-red.png') }}" data-id="{{ $image->id }}" class="btn-dislike">
        @else
            <img src="{{ asset('img/heart-black.png') }}" data-id="{{ $image->id }}" class="btn-like">
        @endif
        <span class="number_likes">{{ count($image->likes) }}</span>
    </div>
</div>