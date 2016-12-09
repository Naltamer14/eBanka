@extends('app')

@section('content')
    <div class="col-sm-4 col-md-4 main col-md-offset-4 col-sm-offset-4">
        <h1 class="page-header">Posodobi: {{ $myAccount->name }}</h1>
        {!! Form::model($myAccount, ['url' => 'accounts']) !!}
        @include ('accounts._form', ['submitButtonText' => 'Posodobi račun'])
        {!! Form::close() !!}
    </div>
@endsection