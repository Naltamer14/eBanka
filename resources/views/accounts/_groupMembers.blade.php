<div class="row placeholders">
    @foreach ($myGroupMembers as $groupMember)
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>{{ $groupMember->name }}</h4>
            <span class="text-muted">€63,830</span>
        </div>
    @endforeach
</div>