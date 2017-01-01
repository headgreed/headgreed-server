@section('css')
<style media="screen">
.nav-side-menu {
    /*排版*/
    position: fixed;
    top: 70px;
    width: 16%;
    height: 90%;
    /*樣式*/
    background-color: #fff;
    border: 1px solid transparent;
    border-color: #d3e0e9;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    padding: 15px 15px 15px 15px;
}
.bg-inverse {
    color: #fff;
    background-color: #424242;
    padding: 10px;
    border-radius: 1px;
}
</style>
@endsection

<div class="nav-side-menu">
    <div class="text-center bg-inverse">
        <h4>{{ strtoupper($board->slug) . ' ' . $board->name }}</h4>
    </div>
    <hr>
    <h5>看板連結</h5>
    <div>
        <ul>
            @foreach ($boards as $board)
                <li><a href="{{ url("/b/$board->slug") }}">{{ $board->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
