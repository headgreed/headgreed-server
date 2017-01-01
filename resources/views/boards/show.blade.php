@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">
            @include('layouts.sidenav')
        </div>
        <div class="col-md-10 col-md-offset-1">
            <board bname="{{ $board->name }}" bslug="{{ $board->slug }}"></board>
        </div>
    </div>
</div>

@endsection
