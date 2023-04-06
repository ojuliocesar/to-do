@php
    $tasks = [
        [
            'id' => 1,
            'done' => true,
            'title' => 'Minha primeira Tarefa',
            'category' => 'Categoria 1',
            'delete_url' => 'https://google.com',
            'edit_url' => 'https://flashfood.site'
        ],
        [
            'id' => 2,
            'done' => true,
            'title' => 'Minha segunda Tarefa',
            'category' => 'Categoria 2',
            'delete_url' => 'https://google.com',
            'edit_url' => 'https://flashfood.site'
        ],
        [
            'id' => 3,
            'done' => true,
            'title' => 'Minha terceira Tarefa',
            'category' => 'Categoria 1',
            'delete_url' => 'https://google.com',
            'edit_url' => 'https://flashfood.site'
        ]
    ];
@endphp

@extends('layouts.app', ['title' => 'Página Inicial'])

@section('header')
    <x-button url="{{route('task.create')}}">Criar Tarefa</x-button>
@endsection

@section('content')
    <section class="main-graphic-wrapper">
        <div class="title-wrapper">
            <h2>Progresso do Dia</h2>

            <div class="date-wrapper">
                <img src="assets/images/icon-prev.png" alt="Prev Icon">
                <small>13 de Dez</small>
                <img src="assets/images/icon-next.png" alt="Next Icon">
            </div>
        </div>

        <p>Tarefas: <b>3/6</b></p>

        <img src="assets/images/graph.png" alt="Graphic">

        <div class="graphic-tasks-message">
            <img src="assets/images/icon-info.png" alt="Icon Info">

            <p>Restam 3 tarefas à serem realizadas</p>
        </div>
    </section>

    <section class="main-tasks-wrapper">
        <select>
            <option value="1">Todas as Tarefas</option>
        </select>

        <ul class="main-list-tasks">
            @foreach ($tasks as $task)
                <li>
                    <div class="title-wrapper">
                        <input type="checkbox" {{$task['done'] ? 'checked' : ''}}>
                        <h3>{{$task['title']}}</h3>
                    </div>

                    <div class="content-task">
                        <p>Fazer tal tal tal</p>
                    </div>

                    <div class="actions">
                        <a href="{{route('task.update')}}">
                            <img src="assets/images/icon-edit.png" alt="Icon Edit">
                        </a>

                        <a href="{{route('task.delete', ['id' => 1])}}">
                            <img src="assets/images/icon-delete.png" alt="Icon Edit">
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endsection