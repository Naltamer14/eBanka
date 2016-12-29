<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

class UsersController extends Controller
{
    /**
     * Create a new accounts controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:users-read')->only('index');
        $this->middleware('sameUserOrPermission:users-read')->only('show');
        $this->middleware('sameUserOrPermission:users-update')->only('update');
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
            return redirect('/')
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
            return redirect('/')
                ->withErrors($validator, 'UpdateProfile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(User $user)
    {
        //
    }
}
