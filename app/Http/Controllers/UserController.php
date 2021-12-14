<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '>', 0)->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = new User($input);
        $user->name = $request->name . ' ' . $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $exists = User::where('email', $user->email)->first();
        if ($exists) {
            return Redirect::route('user.add')->withInput()->with('danger', 'User with email "' . $user->email . '" already exists!');
        }

        if ($user->save())
            return Redirect::route('users')->with('success', 'Successfully added user!');
        else
            return Redirect::route('user.add')->withInput()->withErrors($user->errors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();
        $user->name = $request->name . ' ' . $request->surname;
        $user->email = $request->email;

        if ($request->password != $user->password)
            $user->password = Hash::make($request->password);

        if ($user->update())
            return Redirect::route('users')->with('success', 'Successfully updated user');
        else
            return Redirect::route('editUser', [$id])->withInput()->withErrors($user->errors());
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
    public function showLogin()
    {
        // show the form
        return view('user.login');
    }
    public function doLogin(Request $request)
    {
        // validate the credentials, create rules for the input
        $users = User::where('email', '=', $request->email)->get();

        // check if email address exists
        if ($users -> isEmpty())
            return Redirect::to('login')->withInput()->with('danger', 'Sorry email address does not exist, please register');

        foreach ($users as $user)
        {
            $rules = array(
                'email' => 'required|email',
                'password' => 'required|alphaNum|min:3');

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails())
                return Redirect::to('login')
                    ->withInput($validator)
                    ->withInput()
                    ->with('danger', 'Your login failed, Please try again.');
            else
                $userData = array(
                    'email' => $request->email,
                    'password' => $request->password);

            if (Auth::attempt($userData, true))
                return redirect('reviews');
            else
                return Redirect::to('login')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('danger', 'Your login failed, Please try again');
        }
    }
    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('login');
    }
}
