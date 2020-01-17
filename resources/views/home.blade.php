@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @if( isset($employee_list) && isset($departments) )
                <div class="wrapper white-radius">
                    <div class="title d-flex">
                        <div class="title-icon d-flex justify-content-center align-items-center">
                            <i class="fas fa-list-alt"></i>
                        </div>
                        <h4>Сетка сотрудников</h4>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th></th>
                            @foreach($departments as $department)
                                <th>{{ $department['name'] }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employee_list as $employee)
                            <tr>
                                <td>
                                    {{ $employee['full_name'] }}
                                </td>
                                @foreach($departments as $department)

                                    @if( in_array($department['id'], $employee['departments']) )
                                        <td><i class="fas fa-check"></i></td>
                                    @else
                                        <td></td>
                                    @endif

                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

@endsection