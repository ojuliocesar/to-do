<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ToDo - {{$title}}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">

    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">

    {{-- Componenets --}}
    <link rel="stylesheet" href="{{asset('assets/css/components/button.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components/form.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">

    {{-- Tasks --}}
    <link rel="stylesheet" href="{{asset('assets/css/tasks/create.css')}}">
</head>
<body>
    <div class="container">
        <aside>
            <img class="logo" src="{{asset('assets/images/logo.png')}}" alt="Logo To-Do">
        </aside>
        
        <div class="content">
            <header>
                @section('header')
                @show
            </header>

            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>