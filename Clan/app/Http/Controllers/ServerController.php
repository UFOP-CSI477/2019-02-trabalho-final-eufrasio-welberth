<?php

namespace App\Http\Controllers;

use App\Server;
use App\Game;
use App\Server_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Game $game)
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                return view('servers.create',['game'=>$game]);
            }else{
                return redirect()->route('home');
            }
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                Server::create($request->all());
                return redirect()->route('games.index');
            }else{
                return redirect()->route('home');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        $server_users = Server_User::where('server_id','=',$server->id)->
        join('users','users.id','=','server__users.user_id')->orderBy('users.name')->get('server__users.*');
      
        return view('servers.show', ['server' => Server::findOrFail($server->id),'server_users'=>$server_users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                return view('servers.edit',['server'=>$server]);
            }else{
                return redirect()->route('home');
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                $server->fill($request->all());
                $server ->save();
                return redirect()->route('games.index');
            }else{
                return redirect()->route('home');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                $server->delete();
                return redirect()->route('games.index');
            }else{
                return redirect()->route('home');
            }
        }

    }
}
