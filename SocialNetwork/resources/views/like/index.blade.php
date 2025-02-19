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
                    @include('includes.image2',['image'=>$like->image])
                </div>
            @endforeach

            <!-- pagination -->
            {{ $likes->links() }}
        </div>
    </div>
</div>
@endsection
