@extends('app')

@section('content')
    <div class="col-sm-4 col-md-4 main col-md-offset-4 col-sm-offset-4">
        <h1 class="page-header">Ustvari nov račun</h1>
        {!! Form::model($account = new \App\Account, ['method' => 'POST', 'url' => 'accounts']) !!}
            @include ('accounts._form', ['submitButtonText' => 'Ustvari račun'])
        {!! Form::close() !!}
    </div>
@endsection