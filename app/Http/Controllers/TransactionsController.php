<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Transaction;

class TransactionsController extends Controller
{
    /**
     * Create a new accounts controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superuser')->only(['index']);
        $this->middleware('role:superuser')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        $transactions = Transaction::latest('transferred_at')->transferred()->paginate(10);
        return view('transactions.index')
            ->with('transactions', $transactions)
            ->with('user', $user);
    }

    /**
     * Show page to make a transaction.
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $user
     * @internal param $name
     */
    public function create(User $user)
    {
        $accounts = (Auth::user()->accounts)->pluck('name', 'id');

        return view('transactions.create')
            ->with('user', $user)
            ->with('accounts', $accounts);
    }

    /**
     * Make a transaction.
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(User $user, Request $request)
    {
        $data = array_merge($request->all(), ['ip_address' => $request->ip()]);
        $transaction = $user->transactions()->create($data);
        $account = $user->accounts->where('id', $data['account_id'])->first();
        $account->makeTransaction($transaction);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param Transaction $transaction
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param int $id
     */
    public function show(User $user, Transaction $transaction)
    {
        $account = $transaction->account;
        return view('transactions.show')
            ->with('transaction', $transaction)
            ->with('account', $account)
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param Transaction $transaction
     * @return \Illuminate\View\View
     * @internal param int $id
     */
    public function edit(User $user, Transaction $transaction)
    {
        $accounts = $user->accounts()->pluck('name', 'id');

        return view('transactions.edit')
            ->with('transaction', $transaction)
            ->with('accounts', $accounts)
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param Transaction $transaction
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(User $user, Transaction $transaction, Request $request)
    {
        $transaction->update($request->all());

        return redirect('/');
    }
}
