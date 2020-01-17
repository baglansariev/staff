@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if( isset($departments) )
                <div class="wrapper white-radius">
                    <div class="title d-flex align-items-center">
                        <div class="title-icon d-flex justify-content-center align-items-center">
                            <i class="fas fa-list-alt"></i>
                        </div>
                        <h4>Список отделов</h4>
                        <div class="actions">
                            <a href="{{ route('departments.add.page') }}" class="btn btn-success">Добавить</a>
                        </div>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Количество сотрудников</th>
                            <th>Максимальная зарплата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department['count'] }}</td>
                                <td>{{ $department['name'] }}</td>
                                <td>{{ $department['employee_count'] }}</td>
                                <td>{{ $department['max_salary'] }}</td>
                                <td>
                                    <a href="/department/{{ $department['id'] }}"><i class="fas fa-edit"></i></a>
                                    <button type="button" onclick="Form.departments.delete({{ $department['id'] }}, '{{ csrf_token() }}')"><i class="fas fa-trash"></i></button>
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