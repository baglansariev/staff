<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Template\Page;
    use App\Models\Employee\EmployeeManager;
    use App\Models\Departments\DepartmentsManager;

    class GridController extends Controller
    {
        public function index()
        {
            $employeeManager = new EmployeeManager;
            $departmentsManager = new DepartmentsManager;

            $data['title'] = 'Сетка';

            $data['departments'] = $departmentsManager->getList();
            $employee_list = $employeeManager->getList();

            if ($employee_list)
            {
                foreach ($employee_list as $key => $employee)
                {
                    $data['employee_list'][$key]['id'] = $employee['id'];
                    $data['employee_list'][$key]['full_name'] = $employee['name'] . ' ' . $employee['second_name'] . ' ' . $employee['last_name'];

                    foreach ( $departmentsManager->getList($employee['id']) as $department )
                    {
                        $data['employee_list'][$key]['departments'][] = $department['id'];
                    }
                }
            }

            return (new Page) -> render('home', $data);
        }
    }