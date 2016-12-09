<div class="form-group">
    {!! Form::label('name', 'Ime:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('balance', 'Stanje:') !!}
    {!! Form::text('balance', null, ['class' => 'form-control']) !!}
</div>

@unless (is_null($myAccounts))
    <div class="form-group">
        {!! Form::label('fallback_account', 'Nadomestni račun:') !!}
        {!! Form::select('fallback_account', $myAccounts, null, ['id' => 'fallback_account','class' => 'form-control']) !!}
    </div>
@endunless

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')

@section('footer')
    <script>
        $('#fallback_account').select2({
            placeholder: 'Choose a tag'
        });
    </script>
@endsection
