<?php //header ?>
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Likes I did</h2>
            <hr>

            @foreach($likes as $like)
                <div class="card pub_image">
                    @include('includes.image',['image'=>$like->image])

                    <!-- show the comments -->
                    <div class="comments m-2">
                        <a href="{{ route('image.detail',['id'=>$like->image->id]) }}" class="btn btn-sm btn-warning btn-comments">
                            Comments ({{ count($like->image->comments) }})
                        </a>
                    </div>
                </div>
            @endforeach

            <!-- pagination -->
            {{ $likes->links() }}
        </div>
    </div>
</div>
@endsection
