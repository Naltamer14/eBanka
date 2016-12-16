<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\Role;
use App\User;
use Auth;

class AccountsController extends Controller
{

    /**
     * Create a new accounts controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        $groupMembers = User::paginate(4, null, 'members');
        $accounts = $user->accounts()->paginate(10, null, 'accounts');

        return view('accounts.index')
            ->with('groupMembers', $groupMembers)
            ->with('accounts', $accounts)
            ->with('user', $user);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $accounts = Account::orderBy('updated_at', 'desc')->paginate(30);

        return view('accounts.index')
            ->with('accounts', $accounts)
            ->with('user', Auth::user())
            ->with('noCreateButton', $noCreateButton = false);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function create(User $user)
    {
        $accounts = ($user->accounts)->pluck('name', 'id');

        return view('accounts.create')
            ->with('accounts', $accounts)
            ->with('user', $user);
    }

    /**
     * Store a new account.
     * @param User $user
     * @param AccountRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(User $user, AccountRequest $request)
    {
        $user->accounts()->create($request->all());
        flash('Vaš račun je bil uspešno ustvarjen.', 'success');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param Account $account
     * @return \Illuminate\View\View
     * @internal param int $id
     */
    public function show(User $user, Account $account)
    {
        return view('accounts.show')
            ->with('account', $account)
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param Account $account
     * @return \Illuminate\View\View
     * @internal param int $id
     */
    public function edit(User $user, Account $account)
    {
        $accounts = ($user->accounts)->pluck('name', 'id');
        return view('accounts.edit')
            ->with('account', $account)
            ->with('accounts', $accounts)
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param Account $account
     * @param AccountRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(User $user, Account $account, AccountRequest $request)
    {
        $account->update($request->all());
        flash('Račun ' . $account->name . ' je bil uspešno posodobljen.', 'success');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
