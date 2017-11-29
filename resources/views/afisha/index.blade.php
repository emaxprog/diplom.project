@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Управление афишами</h2>
            <h4>Список афиш</h4>

            <table class="table table-stripes">
                <thead>
                <tr>
                    <th>Название афишы</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($afishas as $afisha)
                    <tr data-id="{{$afisha->id}}">
                        <td>{!! $afisha->name !!}</td>
                        <td>{!! \App\Models\Afisha::getVisibilityText($afisha->visibility) !!}</td>
                        <td>
                            <a href="{{route('afisha.edit',[$afisha])}}" title="Редактировать" class="btn btn-info">
                                <i class="fa fa-edit fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection