@csrf

<label for="text">Texto</label>

<textarea name="text" id="text" class="form-control">{{ old('text',$text->text) }}</textarea>

<label for="group_id">Grupo</label>

<select class="form-control" name="group_id" id="group_id">
    @foreach ($groups as $name => $id)
        <option {{ $text->group_id == $id ? 'selected="selected"' : ""}} value="{{ $id }}">{{ $name }}</option>
    @endforeach
</select>