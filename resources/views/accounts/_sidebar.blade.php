<div class="col-sm-2 col-md-2 sidebar">
    @permission('users-read')
        <span href="#" style="position: relative;padding-left: 70px;margin-top: 24px;">
                <img src="{{ $user->profile_picture }}" style="width: 48px; height:48px; border-radius:50%; position: absolute; top: -15px; left:10px;" class="img-responsive">
                {{ $user->name }}</span>
        </span>
        <hr>
    @endpermission
    <ul class="nav nav-sidebar">
        <li class="{{ isActiveRoute('users.accounts.index') }}"><a href="{{ action('AccountsController@index', ($user->exists) ? $user : Auth::user()) }}">Pregled <span class="sr-only">(current)</span></a></li>
        <li class="{{ isActiveRoute('users.transactions.index') }}"><a href="{!! action('TransactionsController@index', ($user->exists) ? $user : Auth::user()) !!}">Transakcije</a></li>
        <li class="{{ isActiveRoute('users.transactions.create') }}"><a href="{!! action('TransactionsController@create', ($user->exists) ? $user : Auth::user()) !!}">Naredi transakcijo</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li class="{{ isActiveRoute('users.groups.index') }}">{!! link_to_route('users.groups.index', 'Skupine', ($user->exists) ? $user : Auth::user()) !!}</li>
        <li class="{{ isActiveRoute('users.groups.create') }}">{!! link_to_route('users.groups.create', 'Naredi skupino', ($user->exists) ? $user : Auth::user()) !!}</li>
    </ul>
    <hr>
    <ul class="nav nav-sidebar">
        @permission('users-read')
            <li class="{{ isActiveRoute('users.index') }} list-group-item-warning"><a href="{!! action('UsersController@index') !!}">Vsi uporabniki</a></li>
        @endpermission
        @permission('groups-read')
        <li class="{{ isActiveRoute('groups.index') }} list-group-item-warning">{!! link_to_route('groups.index', 'Vse skupine') !!}</li>
        @endpermission
        @permission('accounts-read')
        <li class="{{ isActiveRoute('accounts.all') }} list-group-item-warning"><a href="{!! action('AccountsController@all') !!}">Vsi računi</a></li>
        @endpermission
        @permission('transactions-read')
        <li class="{{ isActiveRoute('transactions.all') }} list-group-item-warning"><a href="{!! action('TransactionsController@all') !!}">Vse transakcije</a></li>
        @endpermission
        @permission('groups-create')
        <li class="{{ isActiveRoute('groups.create') }} list-group-item-warning">{!! link_to_route('groups.create', 'Naredi skupino za...') !!}</li>
        @endpermission
    </ul>
</div>