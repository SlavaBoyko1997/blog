<label for=""></label>
<select class="form-control" name="published" id="">
    @if(isset($article->id))
        <option value="0" @if($article->published == 0) selected=""@endif>Не опубликовано</option>
        <option value="1"@if($article->published == 1) selected=""@endif>Опубликовано</option>
    @else
        <option value="0" >Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label>Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title or ''}}" required>

<label>Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug or ''}}">

<label>Кодительская категория</label>
<select class="form-control" name="categories[]" id="" multiple>
    <option value="0">-- Без родительской категории --</option>
    @include('admin.article.partials.categories',['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short">{{$article->description_short or ""}}</textarea>

<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="description">{{$article->description or ""}}</textarea>

<hr>

<label>Мета заголовка</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовка" value="{{$article->meta_title or ''}}" required>

<label>Мета описания</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описания" value="{{$article->meta_description or ''}}" required>

<label>Ключивие слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключивие слова, через запятую" value="{{$article->meta_keyword or ''}}" required>



<input class="btn btn-primary" type="submit" value="Сохранить">