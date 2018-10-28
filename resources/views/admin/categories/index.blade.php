@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Список категорий@endslot
            @slot('parent')Главная@endslot
            @slot('active')Категории@endslot
        @endcomponent

        <hr>
        <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-0"></i>
            Создать категорию
        </a>
        <table class="table table-striped">
            <thead>
                <th>Найменования</th>
                <th>Публикация</th>
                <th class="text-right">Действие</th>
            </thead>
            <lbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->published}}</td>
                        <td>
                            <a href="{{route('admin.category.edit',['id' =>$category->id])}}" class="fa fa-edit"></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center"><h2>Дание отвутствуют</h2></td>
                    </tr>
                @endforelse
            </lbody>
            <tfoter>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$categories->links}}
                    </ul>
                </td>
            </tfoter>
        </table>
    </div>
@endsection