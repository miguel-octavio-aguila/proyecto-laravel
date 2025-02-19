<?php //header ?>
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>People</h2>
            <!-- search form -->
            <form action="{{ route('user.index') }}" method="GET" id="search-form">
                <div class="row">
                    <div class="form-group col">
                        <input type="text" id="search" class="form-control">
                    </div>
                    <div class="form-group col btn-search">
                        <input type="submit" value="Search" class="btn btn-dark">
                    </div>
                </div>
            </form>

            <hr>

            @foreach($users as $user)
                <div class="profile-user">
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
                        <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="btn btn-dark">View profile</a>
                    </div>
                </div>
                <hr>
            @endforeach
            <!-- pagination -->
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
