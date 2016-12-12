
<div class="form-group">
    {!! Form::label('name', 'Ime:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('balance', 'Stanje:') !!}<br>
    {!! Form::text('balance', null, ['data-slider-id' => 'slider', 'style' => 'width: 100%']) !!}
</div>

@unless (is_null($accounts))
    <div class="form-group">
        {!! Form::label('fallback_account', 'Nadomestni račun:') !!}
        {!! Form::select('fallback_account', $accounts, null, ['id' => 'fallback_account','class' => 'form-control']) !!}
    </div>
@endunless

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.5.3/bootstrap-slider.js"></script>
    <script>
        $('#fallback_account').select2({
            placeholder: 'Choose an account'
        });

        $('#balance').slider({
            value: {{ $account->balance }},
            min: -1000,
            max: 1000,
            step: 5,
            formatter: function(value) {
                return 'Trenutna vrednost: €' + value;
            }
        });
    </script>
@endsection
