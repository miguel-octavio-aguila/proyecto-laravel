<?php //header ?>
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- user profile -->
            <div class="profile-user d-flex flex-column align-items-center text-center">
                @if($user->image)
                    <div class="container-avatar">
                        <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" class="avatar">
                    </div>
                @endif

                <div class="user-info">
                    <h3>{{'@'.$user->nick}}</h3>
                    <h4>{{$user->name.' '.$user->surname}}</h4>
                    <p>
                    {{ 'Sign up: '.\FormatTime::formatTime($user->created_at) }}
                    </p>
                </div>
            </div>

            <!-- user posts -->
            <h2>Posts</h2>
            <hr>
            @foreach($user->images as $image)
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
        </div>
    </div>
</div>
@endsection
