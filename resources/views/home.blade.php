@extends('layouts.app', ['title' => 'Página Inicial'])

@section('header')
    <x-button url="{{route('task.create')}}">Criar Tarefa</x-button>
    <x-button url="{{route('logout')}}">Sair</x-button>
@endsection

@section('content')
    <section id="section-home">
        <div class="main-graphic-wrapper">
            <div class="title-wrapper">
                <h2>Progresso do Dia</h2>
    
                <div class="date-wrapper">
                    <img data-action="prev" src="{{asset('assets/images/icon-prev.png')}}" alt="Prev Icon">
                    <small data-date="{{$date}}">{{$dateString}}</small>
                    <img data-action="next" src="{{asset('assets/images/icon-next.png')}}" alt="Next Icon">
                </div>
            </div>
    
            <p>Tarefas: <b>3/6</b></p>
    
            <img src="{{asset('assets/images/graph.png')}}" alt="Graphic">
    
            <div class="graphic-tasks-message">
                <img src="{{asset('assets/images/icon-info.png')}}" alt="Icon Info">
    
                <p>Restam 3 tarefas à serem realizadas</p>
            </div>
        </div>
    
        <div class="main-tasks-wrapper">
            <select>
                <option value="allTasks">Todas as Tarefas</option>
                <option value="pendingTasks">Tarefas Pendentes</option>
                <option value="finishedTasks">Tarefas Realizadas</option>
            </select>
    
            <ul class="main-list-tasks">
                @foreach ($tasks as $task)
                    <li>
                        <div class="title-wrapper">
                            <input data-task-id="{{$task->id}}" class="doneCheckbox" type="checkbox" {{$task->is_done == true ? 'checked' : ''}}>
                            <h3>{{$task->title}}</h3>
                        </div>
    
                        <div class="content-action-wrapper">
                            <div class="content-task">
                                <p>{{$task->description}}</p>
                            </div>
        
                            <div class="actions">
                                <a href="{{route('task.update', ['id' => $task->id])}}">
                                    <img src="{{asset('assets/images/icon-edit.png')}}" alt="Icon Edit">
                                </a>
        
                                <a href="{{route('task.delete', ['id' => $task->id])}}">
                                    <img src="{{asset('assets/images/icon-delete.png')}}" alt="Icon Edit">
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection