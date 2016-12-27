@extends('app')

@section('content')
    @include('users._navbar')

    <div class="row">
        <div class="col-lg-2">
            <img src="{{ $user->profile_picture }}" style="width: 150px; height:150px; border-radius:50%;">
        </div>

        <div class="col-lg-10">
            <div class="tab-content">
                {{-- Basic information --}}
                <div role="tabpanel" class="tab-pane active" id="basicinfo">
                    <h4>Splošne informacije:</h4>
                    <ul>
                        <li>Ime: {{ $user->name }}</li>
                        <li>Priimek: {{ $user->surname }}</li>
                        <li>E-naslov: {{ $user->email }}</li>
                        <li>Spol: {{ $user->sex }}</li>
                    </ul>
                </div>
                {{-- Private information --}}
                <div role="tabpanel" class="tab-pane" id="privateinfo">
                    <h4>Zasebne informacije:</h4>
                    <ul>
                        <li>Spol: {{ $user->sex }}</li>
                        <li>Država: {{ $user->country }}</li>
                        <li>Mesto: {{ $user->city }}</li>
                        <li>Poštna številka: {{ $user->post_number }}</li>
                        <li>Telefonska številka: {{ $user->phone_number }}</li>
                        <li>Zadnje posodobljen: {{ $user->updated_at }}</li>
                        <li>Registriran od: {{ $user->created_at->format('Y-m-d') }}</li>
                    </ul>
                </div>
                {{-- Past logins --}}
                <div role="tabpanel" class="tab-pane" id="pastlogins">

                </div>
                {{-- Edit user --}}
                <div role="tabpanel" class="tab-pane" id="edituser">
                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->name]]) !!}
                    @include ('users._form', ['submitButtonText' => 'Posodobi'])
                    <a href="{{ action('UsersController@edit', $user) }}">Spremeni geslo</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection