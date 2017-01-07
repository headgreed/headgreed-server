@extends('layouts.app')

@section('js')
<script type="text/javascript">
$(document).ready(function(){
    @if ($errors->has('name'))
        $('#name').focus();
    @elseif($errors->has('about'))
        $('#about').focus();
    @endif
});
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <user-profile></user-profile>
        </div>

        <div class="col-md-8">
            <user-post></user-post>
        </div>
    </div>
</div>
@endsection
