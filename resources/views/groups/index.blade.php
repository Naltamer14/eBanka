@extends('app')

@section('content')

    <h1 class="page-header">Seznam skupin<span class="text-info pull-right">Stran {!! $groups->currentPage() !!} od {!! $groups->lastPage() !!}</span></h1>
    @if (!empty($groups->items()))
        <div class="list-group">
            @foreach ($groups as $group)
                <a class="list-group-item list-group-item-action" href="{{ action('GroupsController@show', [$user, $group]) }}">
                    <h4 class="list-group-item-heading">{{ $group->name }}</h4>
                    <span class="list-group-item-text">Število članov: {{ $group->users->count() }}</span>
                </a>
            @endforeach
        </div>
        {{ $groups->links() }}
    @else
        <span>Ne pripadate nobeni skupini.</span>
    @endif

@endsection