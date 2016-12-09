<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myGroupMembers = User::all();
        $myAccounts = Account::all();

        return view('accounts.index', compact('myGroupMembers', 'myAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myAccounts = (Auth::user()->accounts)->pluck('name', 'id');

        return view('accounts.create', compact('myAccounts'));
    }

    /**
     * Store a new account.
     * @param AccountRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(AccountRequest $request)
    {
        Auth::user()->accounts()->create($request->all());
        return redirect('accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myAccount = Account::find($id);

        return view('accounts.show', compact('myAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myAccount = Account::findOrFail($id);
        // Fallback account is null if it is the user's primary account
        if (!is_null($myAccount->fallback_account)) {
            $myAccounts = (Auth::user()->accounts)->pluck('name', 'id');
        } else {
            $myAccounts = null;
        }

        return view('accounts.edit', compact('myAccount', 'myAccounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountRequest|\Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, AccountRequest $request)
    {
        $myAccount = Account::findOrFail($id);
        $myAccount->update($request->all());

        return redirect('accounts');
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
