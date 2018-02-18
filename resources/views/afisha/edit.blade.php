@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('afisha.update',[$afisha])}}" method="post"
                  class="form form-horizontal afisha-form"
                  enctype="multipart/form-data"
                  data-upload-images-url="{{route('afisha.upload.images',[$afisha])}}"
                  data-destroy-image-url="{{route('afisha.destroy.image',[$afisha])}}">
                {{csrf_field()}}
                <a href="{{route('user.index')}}" class="btn-back btn btn-default"><i class="fa fa-arrow-left"></i>
                    Назад</a>
                <h2 class="text-center">Редактировать афишу "{!! $afisha->name !!}"</h2>
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label class="control-label col-md-2">Изображения</label>
                    <div class="col-md-10">
                        <input type="file" name="images[]" class="image-field" id="afisha-images" accept="image/*"
                               multiple>
                        @if ($errors->has('images'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('images') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="title">Заголовок</label>
                    <div class="col-md-10">
                        <input type="text" name="title" class="form-control" placeholder="Введите заголовок"
                               value="{!! $afisha->title !!}" id="title">
                        @if($errors->has('title'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label col-md-2">Описание</label>
                    <div class="col-md-10">
                        <input type="text" name="description" id="description" placeholder="Введите описание"
                               value="{{$afisha->description}}" class="form-control">
                        @if($errors->has('description'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="caption" class="control-label col-md-2">Подпись</label>
                    <div class="col-md-10">
                        <input type="text" name="caption" id="caption" placeholder="Введите подпись"
                               value="{{$afisha->caption}}" class="form-control">
                        @if($errors->has('caption'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('caption') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Статус</label>
                    <div class="col-md-10">
                        <select name="visibility" class="form-control">
                            <option
                                    value="1" @if($afisha->visibility==1) selected @endif>
                                Отображается
                            </option>
                            <option
                                    value="0" @if($afisha->visibility==0) selected @endif>
                                Скрыта
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{route('user.index')}}" class="btn-back btn btn-default"><i class="fa fa-arrow-left"></i>
                                Назад</a>
                            <button type="submit" formaction="{{route('product.store',['edit'=>true])}}" formmethod="post"
                                    class="btn btn-primary center-block">Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var $imagesInitialPreviewData = JSON.parse('{!! $imagesInitialPreviewData !!}');

            $("#afisha-images").fileinput({
                initialPreview: $imagesInitialPreviewData.initialPreview,
                initialPreviewAsData: true,
                initialPreviewConfig: $imagesInitialPreviewData.initialPreviewConfig,
                @if($afisha->id!==1)
                maxFileCount: 1,
                @endif
                deleteUrl: $('.afisha-form').attr('data-destroy-image-url'),
                overwriteInitial: false,
                uploadUrl: $('.afisha-form').attr('data-upload-images-url'),
                showCancel: false,
                showRemove: false,
                fileActionSettings: {
                    showRemove: false
                }
            });
        })
    </script>
@endsection