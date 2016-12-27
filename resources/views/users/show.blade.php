@extends('app')

@section('content')
    @include('users._navbar')

    <div class="row">
        <div class="col-lg-2">
            <img src="{{ $user->profile_picture }}" style="width: 150px; height:150px; border-radius:50%;">
        </div>

        <div class="col-lg-10">
            <div class="tab-content" id="tabs">
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

                        @if(!$user->roles->isEmpty() || !$user->permissions->isEmpty()) <hr> @endif
                        @unless($user->roles->isEmpty())
                            <li>Funkcija:
                                <ul>
                                    @foreach($user->roles as $role)
                                        <li><strong>{{ $role->display_name }}</strong></li>
                                        Pravice:
                                        <ul>
                                            @foreach($role->permissions as $permission)
                                                <li>{{ $permission->display_name }}</li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </ul></li>
                        @endunless
                        @unless($user->groups->isEmpty())
                            <li>Skupine:
                                <ul>
                                    @foreach($user->groups as $group)
                                        <li>{{ $group->display_name }}</li>
                                    @endforeach
                                </ul></li>
                        @endunless
                        @unless($user->permissions->isEmpty())
                            <li>Dodatne pravice:
                            <ul>
                                @foreach($user->permissions as $permission)
                                    <li>{{ $permission->display_name }}</li>
                                @endforeach
                            </ul></li>
                        @endunless
                    </ul>
                </div>
                {{-- Past logins --}}
                <div role="tabpanel" class="tab-pane" id="pastlogins">

                </div>
                {{-- Edit user --}}
                <div role="tabpanel" class="tab-pane" id="edituser">
                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user]]) !!}
                    @include ('users._form', ['submitButtonText' => 'Posodobi', 'nopassword' => true])
                    {!! Form::close() !!}
                </div>
                {{-- Change password --}}
                <div role="tabpanel" class="tab-pane" id="changepassword">
                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user]]) !!}
                        @include('users._password-input')
                    <br>
                    <div class="form-group">
                        {!! Form::submit('Spremeni', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @if($errors->has('password'))
        <script>
            $('#changepassword_link').tab('show');
        </script>
    @elseif($errors->any())
        <script>
            $('#edituser_link').tab('show');
        </script>
    @endif
    <script>
    </script>
@endsection