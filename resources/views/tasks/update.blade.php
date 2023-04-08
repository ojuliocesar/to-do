@extends('layouts.app', ['title' => 'Tasks'])

@section('header')
    <x-button url="{{route('home')}}">Voltar</x-button>
@endsection

@section('content')
    <section id="section-task-create">
        <h1>Atualizar Tarefa</h1>

        <form class="main-form" method="POST" action="{{route('task.updateAction', ['id' => $task->id])}}">
            @include('components.form.input', [
                'id' => 'title', 
                'title' => 'Título da Tarefa',
                'placeholder' => 'Digite o Titulo da Tarefa',
                'value' => $task->title
            ])

            @include('components.form.input', [
                'id' => 'due_date', 
                'title' => 'Data de Realização',
                'type' => 'datetime-local',
                'value' => $task->due_date
            ])

            @component('components.form.select')
                @slot('id') category_id @endslot
                
                @slot('title') Selecione a Categoria @endslot

                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $task->id ? 'selected' : ''}}>{{$category->title}}</option>
                @endforeach
            @endcomponent

            @include('components.form.textarea', [
                'id' => 'description',
                'title' => 'Descrição',
                'placeholder' => 'Digite a Descrição da Tarefa',
                'value' => $task->description
            ])
            
            <div class="button-wrapper">
                <x-form.button type="reset">Voltar</x-form.button>

                <x-form.button>Atualizar</x-form.button>
            </div>
        </form>
    </section>
@endsection