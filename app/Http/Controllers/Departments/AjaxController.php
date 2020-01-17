<?php
    namespace App\Http\Controllers\Departments;

    use App\Http\Controllers\Controller;
    use App\Models\Employee\EmployeeManager;
    use App\Models\Departments\DepartmentsManager;
    use Illuminate\Http\Request;

    class AjaxController extends Controller
    {
        public $departmentsManager;
        public $employeeManager;

        public function __construct()
        {
            $this->employeeManager = new EmployeeManager;
            $this->departmentsManager = new DepartmentsManager;
        }

        public function create(Request $request)
        {
            $json = [];
            if ( $request->has('name') )
            {
                $this->departmentsManager->create( $request->post('name') );

                $json['success'] = 'Отдел успешно добавлен!';
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
            if ( $request->has(['name', 'department_id']) )
            {
                $department = [
                    'id' => $request->post('department_id'),
                    'name' => $request->post('name'),
                ];
                $this->departmentsManager->update($department);

                $json['success'] = 'Отдел успешно изменен!';
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
                if ( ! $this->employeeManager->getList( (int)$request->post('del') )->count() )
                {
                    $this->departmentsManager->delete( (int)$request->post('del') );

                    $json['success'] = 'Отдел успешно удален!';
                    echo json_encode($json);
                    exit;
                }
                $json['error'] = 'Вы не можете удалить отдел, так как в нем еще работают люди!';
                echo json_encode($json);
                exit;
            }
        }
    }