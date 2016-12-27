
<div class="form-group">
    {!! Form::label('name', '*Ime:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('members', 'Uporabniki:') !!}
    {!! Form::select('members', $users, null, ['id' => 'members','class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')

@section('footer')
    <script>
        $('#members').select2({
            placeholder: 'Izberi tip računa',
            multiple: true
        });
    </script>
@endsection
