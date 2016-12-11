<div class="col-sm-2 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="{{ action('AccountsController@index', $user) }}">Pregled <span class="sr-only">(current)</span></a></li>
        <li class="disabled"><a href="#">Poročila</a></li>
        <li class="disabled"><a href="#">Zgodovina</a></li>
        <li class="disabled"><a href="#">Analiza</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{!! action('TransactionsController@index', $user) !!}">Transakcije</a></li>
        <li><a href="{!! action('TransactionsController@create', $user) !!}">Naredi transakcijo</a></li>
    </ul>
</div>