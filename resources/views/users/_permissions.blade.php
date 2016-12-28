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