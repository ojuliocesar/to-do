<div class="element-wrapper">
    <label for="{{$id}}">{{$title}}</label>
    <select name="{{$id}}" id="{{$id}}">
        <option selected disabled>Selecione alguma Opção</option>

        {{$slot}}
    </select>
</div>