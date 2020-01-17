@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper white-radius">
                <div class="title d-flex">
                    <div class="title-icon d-flex justify-content-center align-items-center">
                        <i class="fas fa-list-alt"></i>
                    </div>
                    <h4>
                        {{ $wrapper_title ?? '' }}
                    </h4>
                </div>
                <div class="departments-form">
                    <form method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="departmentName">Название отдела</label>
                            <input type="text" name="name" id="departmentName" class="form-control">
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="button" class="btn btn-danger" onclick="location.href='/departments'">Отмена</button>
                            <button type="button" class="btn btn-success" onclick="Form.departments.create('.departments-form form')">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection