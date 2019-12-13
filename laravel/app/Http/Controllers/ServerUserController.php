<?php

namespace App\Http\Controllers;

use App\Server_User;
use Illuminate\Http\Request;
use App\Game;
use App\Server;
use Illuminate\Support\Facades\Auth;

class ServerUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $server_users= new Server_User;
         $server_users->fill($request->all());
         $server_users->user_id= Auth::user()->id;
         $server_users->save();
         return redirect()->route('profile.edit');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Server_User  $server_User
     * @return \Illuminate\Http\Response
     */
    public function show(Server_User $server_User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Server_User  $server_User
     * @return \Illuminate\Http\Response
     */
    public function edit(Server_User $server_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Server_User  $server_User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server_User $server_User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Server_User  $server_User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server_User $server_User)
    {
        $server_User->delete();
        return redirect()->route('games.index');
    }
    public function game(){
        $games = Game::orderBy('name')->get();
        return view('server_users.game',['games'=>$games]);

    }
    public function server(Request $game){
        $servers= Server::where('servers.game_id','=',$game->game_id)->get();
        // dd($game);
        return view('server_users.server',['servers'=>$servers]);

    }
}
