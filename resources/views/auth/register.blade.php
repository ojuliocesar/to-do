@extends('layouts.app', ['title' => 'Nova conta'])

@section('header')
    <x-button url="{{route('login')}}">Login</x-button>
@endsection

@section('content')
    <section id="section-register" class="center">
        <h1>Registre-se</h1>

        <form class="main-form" action="{{route('auth.registerAction')}}" method="POST">
            @csrf

            @include('components.form.alert')

            @include('components.form.input', [
                'id' => 'name',
                'title' => 'Seu nome'
            ])

            @include('components.form.input', [
                'id' => 'email',
                'title' => 'Seu e-mail',
                'type' => 'email'
            ])

            @include('components.form.input', [
                'id' => 'password',
                'title' => 'Senha',
                'type' => 'password'
            ])

            @include('components.form.input', [
                'id' => 'password_confirmation',
                'title' => 'Confirme sua Senha',
                'type' => 'password'
            ])

            <div class="button-wrapper">
                <x-form.button type="reset">Limpar</x-form.button>
                <x-form.button>Registrar</x-form.button>
            </div>
        </form>
    </section>  
@endsection