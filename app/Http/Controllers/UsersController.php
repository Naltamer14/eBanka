<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Mockery\Generator\StringManipulation\Pass\Pass;

class UsersController extends Controller
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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(30);
        return view('users.index')
            ->with('users', $users)
            ->with('user', Auth::user());
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $name
     * @internal param int $id
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $name
     * @internal param int $id
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update a user's details
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(User $user, Request $request)
    {
        if(!is_null($request->get('password'))) // Update password
        {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:6|confirmed',
            ]);
            $validator->validate();

            $user->update($request->all());

            flash('Geslo je bilo uspešno posodobljeno.', 'success');
            return redirect('users')
                ->withErrors($validator, 'UpdatePassword');
        }
        else // Update profile
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users' . ',email,' . $user->id,
                'name' => 'required',
                'surname' => 'required',
                'gender' => 'required|boolean',
                'country' => 'required',
                'city' => 'required',
                'post_number' => 'required',
                'phone_number' => 'required|unique:users' . ',phone_number,' . $user->id,
            ]);
            $validator->validate();

            $user->update($request->all());

            flash('Profil ' . $user->name . ' je bil uspešno posodobljen.', 'success');
            return redirect('users')
                ->withErrors($validator, 'UpdateProfile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
