@extends('layouts.app', ['title' => 'Tasks'])

@section('header')
    <x-button url="{{route('home')}}">Home</x-button>
@endsection

@section('content')
    <h2>Visualizar Task</h2>
@endsection