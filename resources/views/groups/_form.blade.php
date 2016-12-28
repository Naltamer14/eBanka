
<div class="form-group">
    {!! Form::label('name', '*Ime:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('users', 'Uporabniki:') !!}
    {!! Form::select('users[]', $users, $group->user_list, ['id' => 'users','class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::label('accounts', 'Računi:') !!}
    {!! Form::select('accounts[]', $accounts, $group->account_list, ['id' => 'accounts','class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')

@section('footer')
    <script>
        $('#accounts').select2({
            placeholder: 'Izberi tip računa',
        });
        $('#users').select2({
            placeholder: 'Izberi uporabnike',
        });
    </script>
@endsection
