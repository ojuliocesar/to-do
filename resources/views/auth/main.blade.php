@extends('layouts.app', ['title' => 'Login'])

@section('header')
    <x-button url="{{route('register')}}">Registre-se</x-button>
@endsection

@section('content')
    <h2>Login</h2>

    <a href="{{route('home')}}">Voltar para Home</a>
@endsection