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
                    @include('includes.image2',['image'=>$image])
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
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
