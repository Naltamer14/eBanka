
<div class="form-group">
    {!! Form::label('name', '*Ime:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('group', 'Uporabniki:') !!}
    {!! Form::select('group', $users, $group->users->pluck('id')->all(), ['id' => 'group','class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')

@section('footer')
    <script>
        $('#group').select2({
            placeholder: 'Izberi tip računa',
            multiple: true
        });
    </script>
@endsection
