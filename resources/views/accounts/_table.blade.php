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
        @unless (is_null($myAccounts))
            @foreach ($myAccounts as $account)
                <tbody>
                    <tr>
                        <td><a href="{{ action('AccountsController@show', ['id' => $account->id]) }}">{{ $account->name }}</a></td>
                        <td>{{ $account->user()->first()->name }}</td>
                        <td>empty</td>
                        <td>empty</td>
                        <td>€{{ number_format($account->balance, 2) }}</td>
                    </tr>
                </tbody>
            @endforeach
        @endunless
    </table>
    <a href="{!! action('AccountsController@create') !!}" class="btn btn-primary">Nov račun</a>
</div>