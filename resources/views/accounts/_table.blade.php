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
        <tbody>
        @foreach ($myAccounts as $account)
            <tr>
                <td>{{ $account->name }}</td>
                <td>
                    {{ $account->user()->first()->name }}</td>
                <td>empty</td>
                <td>empty</td>
                <td>{{ $account->balance }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>