@extends('app')

@section('content')

    @unless(empty($groupMembers))
        <h1 class="page-header">Skupina</h1>
        @include('accounts._groupMembers')
    @endunless
    <h1 class="page-header">Seznam računov<span class="text-info pull-right">Stran {!! $accounts->currentPage() !!} od {!! $accounts->lastPage() !!}</span></h1>
    @include('accounts._table')

@endsection