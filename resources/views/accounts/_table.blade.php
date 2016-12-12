<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ime računa</th>
                <th>Lastnik</th>
                <th>Tip</th>
                <th>Številka računa</th>
                <th>Trenutno stanje</th>
            </tr>
        </thead>
        @unless (is_null($user->accounts))
            @foreach ($user->accounts as $account)
                <tbody>
                    <tr>
                        <td><a href="{{ action('AccountsController@show', [$user, $account]) }}">{{ $account->name }}</a></td>
                        <td>{{ $account->user()->first()->name }}</td>
                        <td>empty</td>
                        <td>empty</td>
                        <td>{!! App\Account::formatBalance($account->balance) !!}</td>
                    </tr>
                </tbody>
            @endforeach
        @endunless
    </table>
    <a href="{!! action('AccountsController@create', $user) !!}" class="btn btn-primary">Nov račun</a>
</div>