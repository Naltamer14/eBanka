@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('accounts._sidebar')
            <div class="col-sm-6 col-sm-offset-4 col-md-5 col-md-offset-4 main">
                <h1 class="page-header">Posodobi račun</h1>

                {!! Form::model($account, ['method' => 'PATCH', 'action' => ['AccountsController@update', $user, $account]]) !!}
                @include ('accounts._form', ['submitButtonText' => 'Posodobi račun'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection