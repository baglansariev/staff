<?php
    namespace App\Http\Controllers\Employee;
    use App\Http\Controllers\Controller;
    use App\Models\Employee\EmployeeManager;
    use App\Models\Departments\DepartmentsManager;
    use App\Http\Controllers\Template\Page;

    class Employee extends Controller
    {
        public $employeeManager;
        public $departmentsManager;

        public function __construct()
        {
            $this->employeeManager = new EmployeeManager;
            $this->departmentsManager = new DepartmentsManager;
        }

        public function index()
        {
            $data['title'] = 'Сотрудники';

            $employee_list = $this->employeeManager->getList();
            $count = 1;

            if ($employee_list)
            {
                foreach ($employee_list as $key => $employee)
                {
                    $data['employee_list'][$key]['id'] = $employee['id'];
                    $data['employee_list'][$key]['full_name'] = $employee['name'] . ' ' . $employee['second_name'] . ' ' . $employee['last_name'];
                    $data['employee_list'][$key]['gender'] = $employee['gender'];
                    $data['employee_list'][$key]['salary'] = number_format($employee['salary'], 0, '', ' ');
                    $data['employee_list'][$key]['departments'] = $this->departmentsManager->getList($employee['id']);
                    $data['employee_list'][$key]['count'] = $count;
                    $count++;
                }
            }

            return (new Page) -> render('employee.employee', $data);
        }

        public function form($id = false)
        {
            $data['title'] = 'Добавление нового сотрудника';

            $data['departments'] = $this->departmentsManager->getList();

            if ($id)
            {
                $data['title'] = 'Изменение сотрудника';
                $data['employee_data'] = $this->employeeManager->getItem((int)$id);
                foreach ( $this->departmentsManager->getList( (int)$id ) as $department )
                {
                    $data['employee_departments'][] = $department['id'];
                }

                return (new Page) -> render('employee.update-form', $data);
            }
            $data['wrapper_title'] = 'Данные сотрудника';

            return (new Page) -> render('employee.create-form', $data);
        }
    }