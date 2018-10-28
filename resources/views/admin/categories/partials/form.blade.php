<label for=""></label>
<select class="form-control" name="published" id="">
    @if(isset($category->id))
        <option value="0" @if($category->published == 0) selected=""@endif>Не опубликовано</option>
        <option value="1"@if($category->published == 1) selected=""@endif>Опубликовано</option>
    @else
        <option value="0" >Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label>Найминования</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категорий" value="{{$category->title or ''}}" required>

<label>Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug or ''}}">

<label>Кодительская категория</label>
<select class="form-control" name="parent_id" id="">
    <option value="0">-- Без родительской категории --</option>
    @include('admin.categories.partials.categories',['categories' => $categories])
</select>

<hr>

<input class="btn btn-primary" type="submit" value="Сохранить">