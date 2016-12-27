<div class="col-sm-2 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ isActiveRoute('users.accounts.index') }}"><a href="{{ action('AccountsController@index', $user) }}">Pregled <span class="sr-only">(current)</span></a></li>
        <li class="disabled"><a href="#">Poročila</a></li>
        <li class="disabled"><a href="#">Zgodovina</a></li>
        <li class="disabled"><a href="#">Analiza</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li class="{{ isActiveRoute('users.transactions.index') }}"><a href="{!! action('TransactionsController@index', $user) !!}">Transakcije</a></li>
        <li class="{{ isActiveRoute('users.transactions.create') }}"><a href="{!! action('TransactionsController@create', $user) !!}">Naredi transakcijo</a></li>
        <li class="{{ isActiveRoute('transactions.all') }} list-group-item-warning"><a href="{!! action('TransactionsController@all') !!}">Vse transakcije</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li class="{{ isActiveRoute('users.index') }} list-group-item-warning"><a href="{!! action('UsersController@index') !!}">Vsi uporabniki</a></li>
        <li class="{{ isActiveRoute('accounts.all') }} list-group-item-warning"><a href="{!! action('AccountsController@all') !!}">Vsi računi</a></li>
    </ul>
</div>