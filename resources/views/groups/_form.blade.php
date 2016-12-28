
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', '*Ime:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@if ($errors->has('name'))
    <span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
</span>
@endif
<div class="form-group">
    {!! Form::label('users', 'Uporabniki:') !!}
    {!! Form::select('users[]', $users, $group->user_list, ['id' => 'users','class' => 'form-control', 'multiple']) !!}
</div>
@if ($errors->has('users'))
    <span class="help-block">
    <strong>{{ $errors->first('users') }}</strong>
</span>
@endif
<div class="form-group">
    {!! Form::label('accounts', 'Računi:') !!}
    {!! Form::select('accounts[]', $accounts, $group->account_list, ['id' => 'accounts','class' => 'form-control', 'multiple']) !!}
</div>
@if ($errors->has('accounts'))
    <span class="help-block">
    <strong>{{ $errors->first('accounts') }}</strong>
</span>
@endif

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script>
        $('#accounts').select2({
            placeholder: 'Izberi račune'
        });
        $('#users').select2({
            placeholder: 'Izberi uporabnike'
        });
    </script>
@endsection
