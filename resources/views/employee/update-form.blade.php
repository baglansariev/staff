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
                @if( isset($employee_data) )
                    <div class="employee-form">
                        <form method="post">
                            {{ csrf_field() }}
                            @foreach($employee_data as $employee)
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-4">
                                            <label for="userName">Имя:</label>
                                            <input name="name" type="text" id="userName" class="form-control" value="{{ $employee['name'] }}" required>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="userSecondName">Фамилия:</label>
                                            <input name="second_name" type="text" id="userSecondName" class="form-control" value="{{ $employee['second_name'] }}" required>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="userLastName">Отчество:</label>
                                            <input name="last_name" type="text" id="userLastName" class="form-control" value="{{ $employee['last_name'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="userGender">Пол:</label>
                                    <select name="gender" id="userGender" class="form-control" required>
                                        @if($employee['gender'] == 'муж')
                                            <option value="муж" selected>муж</option>
                                            <option value="жен">жен</option>
                                        @else
                                            <option value="муж">муж</option>
                                            <option value="жен" selected>жен</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userSalary">Зарплата:</label>
                                    <input name="salary" type="number" id="userSalary" class="form-control" value="{{ $employee['salary'] }}" required>
                                </div>
                                @if( isset($departments) )
                                    <div class="form-group">
                                        <label for="userDepartments">Отделы:</label>
                                        <select name="departments[]" id="userDepartments" class="form-control" multiple required>
                                            @foreach($departments as $department)
                                                @if( in_array($department['id'], $employee_departments) )
                                                    <option value="{{ $department['id'] }}" selected>{{ $department['name'] }}</option>
                                                @else
                                                    <option value="{{ $department['id'] }}">{{ $department['name'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group d-flex justify-content-between">
                                    <button type="button" class="btn btn-danger" onclick="location.href='/employee'">Отмена</button>
                                    <button type="button" class="btn btn-success" onclick="Form.employee.update('.employee-form form', {{ $employee['id'] }})">Сохранить</button>
                                </div>
                            @endforeach
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection