@extends('layouts.app')

@section('js')
<script type="text/javascript">
    @if ($token)
        localStorage.setItem('token', "{{$token}}");
    @endif
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">站長公告</div>

                <div class="panel-body">
                    歡迎來到貪頭寶 <br>
                    本站採用半匿名機制 <br>
                    雖言論自由但也要注意發言 <br>
                    不然會上警局的～ <br>
                    <br>
                    意見調查與Bug回報: 
                    <a href="https://goo.gl/forms/2eG8qoyIOjapUsZg2" target="_blank">連結在此</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">所有看板</div>

                <div class="panel-body">
                    @foreach ($board_categories as $board_category)
                        <h4>{{ $board_category->name }}</h4>
                        @foreach ($board_category->boards as $board)
                            <a href="{{ url("b/$board->slug") }}">{{ $board->name }}</a>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">熱門文章</div>

                <div class="panel-body">
                    建置中...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
