@include('users._email-input')

@include('users._password-input')

<br>

<div class="form-group">
    {!! Form::submit('Naprej', ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')