@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php //include the message view ?>
            @include('includes.message')
            @foreach($images as $image)
            <div class="card pub_image">
                @include('includes.image',['image'=>$image])

                <!-- show the comments -->
                <div class="comments m-2">
                    <a href="{{ route('image.detail',['id'=>$image->id]) }}" class="btn btn-sm btn-warning btn-comments">
                        Comments ({{ count($image->comments) }})
                    </a>
                </div>
            </div>
            @endforeach
            <!-- create pagination -->
            {{$images->render()}}
        </div>
    </div>
</div>
@endsection
