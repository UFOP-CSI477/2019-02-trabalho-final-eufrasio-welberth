<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Server_User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {   $users = User::orderBy('name')->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       // return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
       // $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

       // return redirect()->route('user.index')->withStatus(__('User successfully created.'));
       return redirect()->route('home');
    }
    /**
     * Show the user information
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        $server_users = Server_User::where('user_id','=',$user->id)
        ->join('servers','server__users.server_id','=','servers.id')
        ->join('games','games.id','=','servers.game_id')
        ->select(['server__users.*', 'games.name AS name'])
        ->orderBy('name')->get();
        // dd($server_users);
        return view('users.show', ['user' => User::findOrFail($user->id),'server_users'=>$server_users]);
    }
    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        //return view('users.edit', compact('user'));
        return redirect()->route('home');
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
    //     $user->update(
    //         $request->merge(['password' => Hash::make($request->get('password'))])
    //             ->except([$request->get('password') ? '' : 'password']
    //     ));

    //     return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    return redirect()->route('home');
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {   if(Auth::check()){
            $user->delete();

        //return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
        return redirect()->route('home');
        }
    }
}
