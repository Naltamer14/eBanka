<?php

namespace App\Http\Controllers;

use App\Account;
use App\Group;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\GroupRequest;
use App\Permission;
use App\Role;
use App\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class GroupsController extends Controller
{

    /**
     * Create a new accounts controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:groups-read')->only('all');
        $this->middleware('sameUserOrPermission:groups-create')->only(['create', 'store']);
        $this->middleware('sameUserOrPermission:groups-read')->only(['index', 'show']);
        $this->middleware('sameUserOrPermission:groups-update')->only(['edit', 'update']);
        $this->middleware('sameUserOrPermission:groups-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        $groups = $user->groups()->paginate(10);

        return view('groups.index')
            ->with('groups', $groups)
            ->with('user', $user);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $groups = Group::paginate(30);

        return view('groups.index')
            ->with('groups', $groups)
            ->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function create(User $user)
    {
        $accounts = $user->accounts()->pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('groups.create')
            ->with('accounts', $accounts)
            ->with('users', $users)
            ->with('user', $user);
    }

    /**
     * Store a new account.
     * @param User $user
     * @param AccountRequest|GroupRequest|FormRequest|Request|\Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(User $user, GroupRequest $request)
    {
        $group = Group::create($request->all());
        if(is_null($request->input('accounts')))
        {
            $group->accounts()->sync([]);
        }
        else
        {
            $group->accounts()->sync($request->input('accounts'));
        }

        // Sync users
        $users = array_map(function($value) {
            return ['user_id' => $value, 'role_id' => Role::where('name', 'user')->first()->id];
        }, $request->input('users'));

        $group->users()->sync($users);

        flash('Skupina ' . $group->name . ' je bila uspešno ustvarjena.', 'success');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param Group $group
     * @return \Illuminate\View\View
     * @internal param Account $account
     * @internal param int $id
     */
    public function show(User $user, Group $group)
    {
        return view('groups.show')
            ->with('group', $group)
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param Group $group
     * @return \Illuminate\View\View
     * @internal param Account $account
     * @internal param int $id
     */
    public function edit(User $user, Group $group)
    {
        $accounts = $group->users->mapWithKeys(function ($el) {
            return [($el->name . ' (' . $el->email . ')') => ($el->accounts()->pluck('name', 'id')->toArray())];
        }, collect());
        $accounts = $accounts->all();
        $users = User::pluck('name', 'id');

        return view('groups.edit')
            ->with('group', $group)
            ->with('accounts', $accounts)
            ->with('users', $users)
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param Group $group
     * @param AccountRequest|GroupRequest|FormRequest|Request|\Request $request
     * @return \Illuminate\Http\Response
     * @internal param Account $account
     * @internal param int $id
     */
    public function update(User $user, Group $group, GroupRequest $request)
    {
        $group->update($request->all());
        if(is_null($request->input('accounts')))
        {
            $group->accounts()->sync([]);
        }
        else
        {
            $group->accounts()->sync($request->input('accounts'));
        }

        // Sync users
        $users = array_map(function($value) {
            return ['user_id' => $value, 'role_id' => Role::where('name', 'user')->first()->id];
        }, $request->input('users'));

        $group->users()->sync($users);

        flash('Skupina ' . $group->name . ' je bila uspešno posodobljena.', 'success');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @param Account $account
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(User $user, Account $account)
    {
    }
}
