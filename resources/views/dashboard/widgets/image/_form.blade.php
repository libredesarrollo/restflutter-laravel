@csrf

<label for="name">Nombre</label>
<input type="text" name="name" id="name" class="form-control" value="{{ old('name',$image->name) }}">

<label for="url">Url</label>
<input type="file" name="url" id="url" class="form-control">

<label for="group_id">Grupo</label>

<select class="form-control" name="group_id" id="group_id">
    @foreach ($groups as $name => $id)
        <option {{ $image->group_id == $id ? 'selected="selected"' : ""}} value="{{ $id }}">{{ $name }}</option>
    @endforeach
</select>