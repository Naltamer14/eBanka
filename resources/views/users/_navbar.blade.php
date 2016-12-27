<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ action('UsersController@show', $user) }}">{{ $user->name }} {{ $user->surname }}</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#basicinfo" id="basicinfo_link" aria-controls="basicinfo" role="tab" data-toggle="tab">Splošne informacije</a></li>
                <li role="presentation"><a href="#privateinfo" id="privateinfo_link" aria-controls="privateinfo" role="tab" data-toggle="tab">Zasebne informacije</a></li>
                <li role="presentation"><a href="#pastlogins" id="pastlogins_link" aria-controls="pastlogins" role="tab" data-toggle="tab">Pretekle prijave</a></li>
                <li role="presentation"><a href="#edituser" id="edituser_link" aria-controls="edituser" role="tab" data-toggle="tab">Spremeni podatke</a></li>
                <li role="presentation"><a href="#changepassword" id="changepassword_link" aria-controls="changepassword" role="tab" data-toggle="tab">Spremeni geslo</a></li>
                <li><a href="{{ action('AccountsController@index', $user) }}">Bančni računi <i class="fa fa-external-link" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</nav>