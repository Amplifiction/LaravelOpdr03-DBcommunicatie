<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index',[
            'games' => $games
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game = new Game();
        $publishers = Publisher::all(); // voor form select
        return view('games.create' , [
            'game' => $game,
            'publishers' => $publishers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'publisher_id'=>'required'
        ]);

        $game = new Game();
        $game->name = $request->name;
        $game->publisher_id = $request->publisher_id;
        // if(isset($request->completed)) {
        //     $completedCheck = 1;
        // } else {
        //     $completedCheck = 0;
        // }
        // $game->completed = $completedCheck;
        $game->completed = $request->has('completed');
        $game->save();

        return redirect()->route('games.show', $game);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        // $publisher = Publisher::where('id', $game->publisher_id)->first();
        $games = Game::where([
            'publisher_id' => $game->publisher_id,
            ['id', '!=', $game->id]
            ])->get();
        return view('games.show', [
            'game' => $game,
            'games' => $games,
            // 'publisher' => $publisher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $publishers = Publisher::all(); //voor form select
        return view('games.edit', [
            'game' => $game,
            'publishers' => $publishers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name'=>'required',
            'publisher_id'=>'required'
        ]);

        $game->name = $request->name;
        $game->publisher_id = $request->publisher_id;
        $game->completed = $request->has('completed');
        $game->save();

        return redirect()->route('games.show', $game);
    }

    /**
     * Show the form for deleting
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Game $game)
    {
        return view('games.delete' , [
            'game'=>$game
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game) //Moet met $id?
    {
        $game->delete();
        return redirect()->route('games.index');
    }

    public function markcomplete(Game $game)
    {
        $game->completed = !$game->completed; //Dit is een toggle. ! betekent NOT. Indien not false: wordt true en omgekeerd.
        $game->save();

        return redirect()->route('games.index'); //Vervelend kiezen: index of show? Show is verwarrend indien je onder games.show > other games table op mark (in)complete klikt. De show wordt dan die van het gewijzigde spel ipv het spel waar je zat.
    }

    // public function markincomplete(Game $game) //overbodig owv bovenstaande toggle.
    // {
    //     $game->completed = 0;
    //     $game->save();

    //     return redirect()->route('games.show', $game);
    // }
}
