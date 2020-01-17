<?php
    namespace App\Http\Controllers\Departments;
    use App\Http\Controllers\Controller;
    use App\Models\Departments\DepartmentsManager;
    use App\Models\Employee\EmployeeManager;
    use App\Http\Controllers\Template\Page;

    class Departments extends Controller
    {
        public function index()
        {
            $data['title'] = 'Отделы';
            $departmentsManager = new DepartmentsManager;
            $employeeManager = new EmployeeManager;

            $departments = $departmentsManager->getList();
            if ($departments)
            {
                $count = 1;
                foreach ($departments as $key => $department)
                {
                    $data['departments'][$key]['id'] = $department['id'];
                    $data['departments'][$key]['name'] = $department['name'];
                    $department_salaries = [];

                    foreach ( $employeeManager->getList($department['id']) as $employee )
                    {
                        $department_salaries[] = $employee['salary'];
                    }

                    $data['departments'][$key]['max_salary'] = @number_format(max($department_salaries), 0, '', ' ');
                    $data['departments'][$key]['employee_count'] = count($department_salaries);
                    $data['departments'][$key]['count'] = $count;
                    $count++;
                }
            }
            return (new Page) -> render('departments.departments', $data);
        }

        public function form($id = false)
        {
            $data['wrapper_title'] = 'Данные отдела';

            if ($id)
            {
                $data['title'] = 'Изменение отдела';
                $data['department'] = (new DepartmentsManager)->getItem($id);

                return (new Page) -> render('departments.update-form', $data);
            }

            $data['title'] = 'Добавление нового отдела';

            return (new Page) -> render('departments.create-form', $data);
        }
    }