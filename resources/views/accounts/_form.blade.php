
<div class="form-group">
    {!! Form::label('name', '*Ime:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('balance', '*Stanje:') !!}<br>
    {!! Form::text('balance', null, ['data-slider-id' => 'slider', 'style' => 'width: 100%']) !!}
</div>

<div class="form-group">
    {!! Form::label('type', '*Tip računa:') !!}
    {!! Form::select('type', ['Navadni','Varčni', 'Upokojitveni', 'Zaklenjeni'], null, ['id' => 'type','class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('fallback_account', 'Nadomestni račun:') !!}
    {!! Form::select('fallback_account', $accounts, null, ['id' => 'fallback_account','class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')

@section('footer')
    <script>
        $('#fallback_account').select2({
            placeholder: 'Izberi si račun',
            allowClear: true
        });
        $('#type').select2({
            placeholder: 'Izberi tip računa',
            minimumResultsForSearch: -1
        });

        $('#balance').slider({
            value: {{ (($account->balance) ? $account->balance : 0) }},
            min: -1000,
            max: 1000,
            step: 5,
            formatter: function(value) {
                return 'Trenutna vrednost: €' + value;
            }
        });
    </script>
@endsection
