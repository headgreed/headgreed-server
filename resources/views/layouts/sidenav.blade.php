@section('css')
<style media="screen">
.nav-side-menu {
    /*排版*/
    position: fixed;
    top: 70px;
    width: 16%;
    height: 90%;
    z-index: 1;
    /*樣式*/
    background-color: #fff;
    border: 1px solid transparent;
    border-color: #d3e0e9;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    padding: 15px 15px 15px 15px;
}
@media (min-width:992px){
    /* 一般 */
    #nav-side-fix {
        display: none;
    }
}
@media (max-width:991px){
    /* 手機 */
    .nav-side-menu {
        display: none;
    }
    #nav-side-fix {
        position: fixed;
        bottom: 25px;
        z-index: 2;
        background-color: #000;
        border-radius: 50px;
    }
    #nav-side-fix i {
        color: #fff;
    }
}
.bg-inverse {
    color: #fff;
    background-color: #5fc8af;
    padding: 10px;
    border-radius: 1px;
}
</style>
@endsection

@section('js')
<script type="text/javascript">
var nav_side_status = false;
function toggleNav() {
    if (!nav_side_status) {
        nav_side_status = !nav_side_status;
        $(".nav-side-menu").css('display', 'block').css('width', '50%');
        $("#nav-side-icon").removeClass('fa-bars').addClass('fa-times');
    } else {
        nav_side_status = !nav_side_status;
        $(".nav-side-menu").css('display', 'none').css('width', '0%');
        $("#nav-side-icon").removeClass('fa-times').addClass('fa-bars');
    }
}
</script>
@endsection

<div id="nav-side-fix">
    <a class="btn" href="#navigation-main" onclick="toggleNav()">
      <i id="nav-side-icon" class="fa fa-bars" aria-hidden="true"></i>
    </a>
</div>

<div class="nav-side-menu">
    <div class="text-center bg-inverse">
        <h4>{{ strtoupper($board->slug) . ' ' . $board->name }}</h4>
    </div>
    <hr>
    <div>
        @foreach ($board_categories as $boards)
            <h4>{{ $boards->name }}</h4>
            @foreach ($boards->boards as $board)
                <a href="{{ url("/b/$board->slug") }}">{{ $board->name }}</a>
            @endforeach
        @endforeach
    </div>
</div>
