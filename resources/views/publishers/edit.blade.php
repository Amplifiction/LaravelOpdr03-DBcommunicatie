@extends('layouts.default')

@section('title', 'Edit publisher')

@section('content')

    @include('publishers.includes.back-to-list', ['showLink' => true])

    <h2 class="text-4xl font-semibold mb-4">Edit publisher</h2>

    <form class="bg-gray-100 shadow-2xl p-4 rounded-lg" action="{{ route('publishers.update', $publisher) }}" method="post">
        @csrf
        @method('put')
        @include('publishers.includes.form', [
            'buttonText' => 'Edit publisher',
            // 'publisher' => $publisher
        ])
    </form>
@endsection
