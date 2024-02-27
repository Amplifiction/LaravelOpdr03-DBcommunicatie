@extends('layouts.default')

@section('title', 'Game: Game title here')

@section('content')

    @include('games.includes.back-to-list')

    <h2 class="text-4xl font-semibold mb-4">{{$game->name}}</h2>
    <p class="text-lg text-gray-600 mb-4">Published by <a class="font-semibold text-blue-500 hover:underline" href="{{ route('publishers.show', 1) }}">{{$publisher->name}}</a></p>

    <div class="my-4">
        @include('games.includes.actions')
    </div>

    <p class="p-4 inline-block bg-green-100 text-green-600 rounded-xl">This game has already been completed!</p>
    {{-- <p class="p-4 inline-block bg-red-100 text-red-600 rounded-xl">This game is not completed yet!</p> --}}

    <div class="mt-12">
        <h3 class="mb-2 text-xl font-semibold">Other games by this publisher:</h3>
        @include('games.includes.game-table', ['games' => $games])
    </div>

@endsection
