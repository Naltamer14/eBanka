<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ime računa</th>
                <th>Lastnik</th>
                <th>Tip</th>
                <th>Številka kartice</th>
                <th>Trenutno stanje</th>
            </tr>
        </thead>
        @unless (empty($accounts))
            @foreach ($accounts as $account)
                <tbody>
                    <tr>
                        <td><a href="{{ action('AccountsController@show', [$user, $account]) }}">{{ $account->name }}</a></td>
                        <td>{{ ($account->user()->first())->name }}</td>
                        <td>{{ $account->account_type }}</td>
                        <td><a href="" class="iTooltip" data-toggle="tooltip" title="Expiration date: {{ $account->card_approved_until }}">{{ $account->card_number }}</a></td>
                        <td>{!! App\Account::formatBalance($account->balance) !!}</td>
                    </tr>
                </tbody>
            @endforeach
        @endunless
    </table>
    {{ $accounts->appends(Request::query())->links() }}<br>
    @unless(isset($noCreateButton))
        <a href="{!! action('AccountsController@create', $user) !!}" class="btn btn-primary">Nov račun</a>
    @endunless
</div>