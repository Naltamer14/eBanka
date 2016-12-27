<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">E-Banka</a>
        </div>
        <li id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ action('AccountsController@index', Auth::user()) }}">Pregled</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;padding-left: 50px;">
                        <img src="{{ Auth::user()->profile_picture }}" style="width: 32px; height:32px; border-radius:50%; position: absolute; top: 10px; left:10px;" class="img-responsive">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{!! action('UsersController@show', Auth::user()) !!}"><i class="padding fa fa-user" aria-hidden="true"></i> Profil</a></li>
                        <li><a href=""><i class="fa fa-cog" aria-hidden="true"></i> Nastavitve</a></li>
                        <li>
                            <a href="{!! url('/logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="padding fa fa-sign-out" aria-hidden="true"></i> Izpis</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="menu">--}}
                        {{--{{ Auth::user()->name }}--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--<li><a href="{!! action('UsersController@show', Auth::user()) !!}"> <span class="badge">7</span></a></li>--}}
                    {{--</ul>--}}
                <li class="disabled"><a href="#">Pomoč</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Išči...">
            </form>
        </div>
    </div>
</nav>
