@if($errors->any())
    <ul class="alert alert-{{$type ?? 'danger'}}">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif