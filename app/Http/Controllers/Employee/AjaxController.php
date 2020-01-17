<?php
    namespace App\Http\Controllers\Employee;
    use App\Models\Employee\EmployeeManager;
    use Illuminate\Http\Request;

    class AjaxController
    {
        private $employeeManager;

        public function __construct()
        {
            $this->employeeManager = new EmployeeManager;
        }

        public function create(Request $request)
        {
            $json = [];
            if ( $request->has(['name', 'second_name', 'gender', 'salary', 'departments']))
            {
                $employee = [
                    'name' => $request->post('name'),
                    'second_name' => $request->post('second_name'),
                    'last_name' => $request->post('last_name') ?? null,
                    'gender' => $request->post('gender'),
                    'salary' => (int)$request->post('salary'),
                ];
                $departments = $request->post('departments');

                $this->employeeManager->create($employee, $departments);

                $json['success'] = 'Сотрудник успешно добавлен!';
                echo json_encode($json);
                exit;
            }
            $json['error'] = 'Заполните все поля!';
            echo json_encode($json);
            exit;
        }

        public function update(Request $request)
        {
            $json = [];
            if ( $request->has(['name', 'second_name', 'gender', 'salary', 'departments', 'employee_id']) )
            {
                if ( $this->employeeManager->getItem((int)$request->post('employee_id')) )
                {
                    $employee = [
                        'name' => $request->post('name'),
                        'second_name' => $request->post('second_name'),
                        'last_name' => $request->post('last_name') ?? null,
                        'gender' => $request->post('gender'),
                        'salary' => (int)$request->post('salary'),
                        'id' => $request->post('employee_id'),
                    ];
                    $departments = $request->post('departments');

                    $this->employeeManager->update($employee, $departments);

                    $json['success'] = 'Сотрудник успешно изменен!';
                    echo json_encode($json);
                    exit;
                }

                $json['error'] = 'Не существует сотрудника с таким ID!';
                echo json_encode($json);
                exit;
            }

            $json['error'] = 'Заполните все поля!';
            echo json_encode($json);
            exit;
        }

        public function delete(Request $request)
        {
            $json = [];

            if ($request->has('del'))
            {
                $this->employeeManager->delete( (int)$request->post('del') );

                $json['success'] = 'Сотрудник успешно удален!';
                echo json_encode($json);
                exit;
            }
        }
    }