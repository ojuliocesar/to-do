@extends('layouts.app', ['title' => 'Tasks'])

@section('header')
    <x-button url="{{route('home')}}">Voltar</x-button>
@endsection

@section('content')
    <section id="section-task-create">
        <h1>Criar Tarefa</h1>

        <form class="main-form" method="POST" action="{{route('task.createAction')}}">
            @include('components.form.input', [
                'id' => 'title', 
                'title' => 'Título da Tarefa',
                'placeholder' => 'Digite o Titulo da Tarefa'
            ])

            @include('components.form.input', [
                'id' => 'due_date', 
                'title' => 'Data de Realização',
                'type' => 'datetime-local'
            ])

            @component('components.form.select')
                @slot('id') category_id @endslot
                
                @slot('title') Selecione a Categoria @endslot

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            @endcomponent

            @include('components.form.textarea', [
                'id' => 'description',
                'title' => 'Descrição',
                'placeholder' => 'Digite a Descrição da Tarefa'
            ])
            
            <div class="button-wrapper">
                <x-form.button type="reset">Limpar</x-form.button>

                <x-form.button>Criar</x-form.button>
            </div>
        </form>
    </section>
@endsection