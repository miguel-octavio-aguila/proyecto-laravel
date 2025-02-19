<?php // The message.blade.php file is included here.
// if exists message ?>
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
