@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('accounts._sidebar')

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Pregled</h1>

                <h2 class="sub-header">Skupina</h2>
                @include('accounts._groupMembers')

                <h2 class="sub-header">Računi</h2>
                @include('accounts._table')
            </div>
        </div>
    </div>
@endsection