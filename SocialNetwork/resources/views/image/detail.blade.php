@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php //include the message view ?>
            @include('includes.message')
            <div class="card pub_image pub_image_detail">
                @include('includes.image2')
                @if(Auth::user() && Auth::user()->id == $image->user->id)
                    <div class="actions">
                        <a href="{{ route('image.edit',['id'=>$image->id]) }}" class="btn btn-sm btn-dark">Update</a>
                        <!-- Button to open the modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                            Delete
                        </button>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1"  aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        If you delete this post, you will not be able to recover it. Are you sure you want to delete it?
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-danger">Delete definitively</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif  
                
                <!-- comments -->
                <div class="comments">
                    <hr>
                    @foreach($image->comments as $comment)
                        <div class="comment">
                            <span class="nickname">{{ '@'.$comment->user->nick }}</span>
                            <span class="nickname date">{{ ' | '.\FormatTime::formatTime($comment->created_at) }}</span>
                            <p>{{ $comment->content }}</p>
                            @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" 
                                    class="btn btn-danger btn-sm" 
                                    style="font-size: 0.70rem; padding: 0.20rem 0.5rem;">
                                        Delete
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <hr>
                    <form method="POST" action="{{ route('comment.save') }}" class="m-2">
                        @csrf
                        <input type="hidden" name="image_id" value="{{ $image->id }}">
                        <p>
                            <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content"></textarea>
                            @if($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </p>
                        <button type="submit" class="btn btn-success">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection