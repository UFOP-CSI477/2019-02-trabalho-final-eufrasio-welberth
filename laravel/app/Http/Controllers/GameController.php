<?php

namespace App\Http\Controllers;

use App\Game;
use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::orderBy('name')->get();
        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                return view('games.create');
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
            Game::create($request->all());
            return redirect()->route('games.index');
            }else{
                return redirect()->route('home');
            }
        }

    }
    public function search(Request $request)
    {
        $games = Game::where('name', 'like', "%$request->name%")->orderBy('name')->get();

        return view('games.search', ['games' => $games]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $servers = Server::where('game_id', '=', $game->id)->orderBy('name')->get();

        return view('games.show', ['game' => Game::findOrFail($game->id), 'servers' => $servers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                return view('games.edit', ['game' => $game]);
            }else{
                return redirect()->route('home');
            }
        }
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                $game->fill($request->all());
                $game->save();
                return view('games.edit', ['game' => $game]);
            }else{
                return redirect()->route('home');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if (Auth::check()) {
            if (Auth::user()->type == 1) {
                $game->delete();
                return redirect()->route('games.index');
            }else{
                return redirect()->route('home');
            }
        }

    }
}
