@extends('layouts.app', ['title' => 'Nova conta'])

@section('header')
    <x-button url="{{route('login')}}">Login</x-button>
@endsection

@section('content')
    <h2>Registre-se</h2>
@endsection