<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user/users',compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user/edit',compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return Redirect::route('user.edit',$id)->with('status', 'user-updated');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        try {
            $user->delete();
        } catch (\Throwable $th) {
            return Redirect::route('user.index')->withErrors($th->getMessage());
        }
        return Redirect::route('user.index');
    }
}
