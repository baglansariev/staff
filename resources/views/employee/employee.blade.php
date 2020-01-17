@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @if( isset($employee_list) )
                <div class="wrapper white-radius">
                    <div class="title d-flex">
                        <div class="title-icon d-flex justify-content-center align-items-center">
                            <i class="fas fa-list-alt"></i>
                        </div>
                        <h4>Список сотрудников</h4>
                        <div class="actions">
                            <a href="{{ route('employee.add.page') }}" class="btn btn-success">Добавить</a>
                        </div>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Ф.И.О.</th>
                            <th>Пол</th>
                            <th>Зарплата</th>
                            <th>Отделы</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employee_list as $employee)
                            <tr>
                                <td>{{ $employee['count'] }}</td>
                                <td>{{ $employee['full_name'] }}</td>
                                <td>{{ $employee['gender'] }}</td>
                                <td>{{ $employee['salary'] }}</td>
                                <td>
                                    @foreach($employee['departments'] as $department)
                                        {{ $department['name'] . ', ' }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="/employee/{{ $employee['id'] }}"><i class="fas fa-edit"></i></a>
                                    <button type="button" onclick="Form.employee.delete({{ $employee['id'] }}, '{{ csrf_token() }}')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

@endsection