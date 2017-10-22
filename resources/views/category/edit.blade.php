@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('category.update',[$category])}}" method="post"
                  class="form form-horizontal">
                {{csrf_field()}}
                <h2 class="text-center">Редактировать категорию "{!! $category->name !!}"</h2>
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label class="control-label col-md-2" for="name">Название</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="Введите название категории"
                               value="{!! $category->name !!}" id="name">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug" class="control-label col-md-2">Slug</label>
                    <div class="col-md-10">
                        <input type="text" name="slug" id="slug" placeholder="Введите слаг"
                               value="{{$category->slug}}" class="form-control">
                        @if($errors->has('slug'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Главная категория</label>
                    <div class="col-md-10">
                        <select name="parent_id" class="form-control">
                            <option value="0">Главная категория</option>
                            @if (isset($parents))
                                @foreach ($parents as $parent)
                                    <option value="{{$parent->id}}"
                                            @if($parent->id==$category->parent_id) selected @endif>{!! $parent->name !!}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="sort">Порядковый номер</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="sort" placeholder="Введите порядковый номер"
                               value="{!! $category->sort !!}" id="sort">
                        @if($errors->has('sort'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('sort') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Статус</label>
                    <div class="col-md-10">
                        <select name="visibility" class="form-control">
                            <option
                                    value="1" @if($category->visibility==1) selected @endif>
                                Отображается
                            </option>
                            <option
                                    value="0" @if($category->visibility==0) selected @endif>
                                Скрыта
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary center-block">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection