<div class="col-sm-2 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ isActiveRoute('users.accounts.index') }}"><a href="{{ action('AccountsController@index', $user) }}">Pregled <span class="sr-only">(current)</span></a></li>
        <hr>
        <li class="{{ isActiveRoute('users.transactions.index') }}"><a href="{!! action('TransactionsController@index', $user) !!}">Transakcije</a></li>
        <li class="{{ isActiveRoute('users.transactions.create') }}"><a href="{!! action('TransactionsController@create', $user) !!}">Naredi transakcijo</a></li>
        @permission('transactions-read')
        <li class="{{ isActiveRoute('transactions.all') }} list-group-item-warning"><a href="{!! action('TransactionsController@all') !!}">Vse transakcije</a></li>
        @endpermission
    </ul>
    <ul class="nav nav-sidebar">
        <li class="{{ isActiveRoute('users.groups.index') }}"><a href="{!! action('GroupsController@index', $user) !!}">Skupine</a></li>
        <li class="{{ isActiveRoute('users.groups.create') }}"><a href="{!! action('GroupsController@create', $user) !!}">Naredi Skupino</a></li>
        @permission('groups-read')
            <li class="{{ isActiveRoute('groups.all') }} list-group-item-warning"><a href="{!! action('GroupsController@all') !!}">Vse skupine</a></li>
        @endpermission
    </ul>
    <hr>
    <ul class="nav nav-sidebar">
        @permission('users-read')
            <li class="{{ isActiveRoute('users.index') }} list-group-item-warning"><a href="{!! action('UsersController@index') !!}">Vsi uporabniki</a></li>
        @endpermission
        @permission('accounts-read')
        <li class="{{ isActiveRoute('accounts.all') }} list-group-item-warning"><a href="{!! action('AccountsController@all') !!}">Vsi računi</a></li>
        @endpermission
    </ul>
</div>