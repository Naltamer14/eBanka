<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param $name
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($name)
    {
        $myUser = User::where('name', '=', $name)->first();
        return view('users.show', compact('myUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $name
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($name)
    {
        $myUser = User::where('name', '=', $name)->first();
        return view('users.edit', compact('myUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $name
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $name)
    {
        $myUser = User::where('name', '=', $name)->first();
        $myUser->update($request->all());

        return redirect('users');
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
