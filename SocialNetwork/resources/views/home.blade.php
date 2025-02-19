@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php //include the message view ?>
            @include('includes.message')
            @foreach($images as $image)
            <div class="card pub_image interaction">
                @include('includes.image2',['image'=>$image])
            </div>
            @endforeach
            <!-- create pagination -->
            <div class="pagination flex justify-center mt-4">
                {{ $images->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
