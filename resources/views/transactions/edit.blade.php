@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('accounts._sidebar')
            <div class="col-sm-6 col-sm-offset-4 col-md-5 col-md-offset-4 main">
                <h1 class="page-header">Spremeni podatke o transakciji</h1>

                {!! Form::model($transaction, ['method' => 'PATCH', 'action' => ['TransactionsController@update', $user, $transaction]]) !!}
                    @include ('transactions._form', ['submitButtonText' => 'Posodobi'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection