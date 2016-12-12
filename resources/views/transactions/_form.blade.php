<div class="form-group">
    {!! Form::label('purpose', '*Namen:') !!}
    {!! Form::text('purpose', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('method', '*Vrsta:') !!}
    {!! Form::select('method', ['Dvig', 'Polog'], null, ['id' => 'method','class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('account_id', '*Transakcijski račun:') !!}
    {!! Form::select('account_id', $accounts, null, ['id' => 'account_id','class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('amount', '*Vsota:') !!}
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">€</span>
        {!! Form::text('amount', null, ['class' => 'form-control', 'aria-describedby' => "basic-addon1"]) !!}
    </div>
</div>

<hr>

<div class="form-group">
    {!! Form::label('transferred_at', '*Datum transakcije:') !!}
    {!! Form::input('date', 'transferred_at', $transaction->transferred_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')

@section('footer')
    <script>
        $('#method').select2({
            placeholder: 'Select type',
            minimumResultsForSearch: Infinity
        });
        $('#account_id').select2({
            placeholder: "Select an account"
        });
    </script>
@endsection