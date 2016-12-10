<div class="row placeholders">
    @foreach ($groupMembers as $groupMember)
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4><a href="{{ action('UsersController@show', ['name' => $groupMember->name]) }}">{{ $groupMember->name }}</a></h4>
            <span class="text-muted">€{{ number_format($groupMember->balance(), 2) }}</span>
        </div>
    @endforeach
</div>