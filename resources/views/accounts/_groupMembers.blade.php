    <div class="row placeholders">
        @foreach ($groupMembers as $groupMember)
            <div class="col-xs-6 col-sm-3 placeholder">
                <img src="{{ $groupMember->profile_picture }}" style="width: 200px; height:200px; border-radius:50%;" class="img-responsive">
                <h4><a href="{{ action('UsersController@show', ['name' => $groupMember->name]) }}">{{ $groupMember->name }}</a></h4>
                <span class="text-muted">
                    {!! App\Account::formatBalance($groupMember->balance()) !!}
                </span>
            </div>
        @endforeach
    </div>
    {!! $groupMembers->appends(Request::query())->links() !!}