@extends('layouts.app', ['title' => 'Login'])

@section('header')
    <x-button url="{{route('register')}}">Registre-se</x-button>
@endsection

@section('content')
    <section id="section-login" class="center">
        <h1>Autenticação</h1>

        <form class="main-form" action="{{route('auth.loginAction')}}" method="POST">

            @csrf

            @include('components.form.alert')

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

            <div class="button-wrapper">
                <x-form.button type="reset">Limpar</x-form.button>
                <x-form.button>Entrar</x-form.button>
            </div>
        </form>
    </section>  
@endsection