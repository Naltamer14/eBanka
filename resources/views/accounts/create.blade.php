@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('accounts._sidebar')
            <div class="col-sm-6 col-sm-offset-4 col-md-5 col-md-offset-4 main">
                <h1 class="page-header">Ustvari nov račun</h1>
                {!! Form::model($account = new \App\Account, ['method' => 'POST', 'action' => ['AccountsController@index', $user]]) !!}
                    @include ('accounts._form', ['submitButtonText' => 'Ustvari račun'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection