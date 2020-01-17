<?php
    namespace App\Http\Controllers\Template;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Template\Common\Header;
    use App\Http\Controllers\Template\Common\ColumnLeft;
    use App\Http\Controllers\Departments\Departments;
    use App\Http\Controllers\Employee\Employee;

    class Page extends Controller
    {
        public $employee;
        public $departments;
        private $header;
        private $column_left;
        private $request;

        public function __construct()
        {
            $this->header = new Header;
            $this->column_left = new ColumnLeft;
            $this->employee = new Employee;
            $this->departments = new Departments;
//            $this->request = new Request;
        }

        public function employeeForm()
        {
            $data['title'] = 'Добавление нового сотрудника';
            $data['wrapper_title'] = 'Данные сотрудника';

            $data['departments'] = $this->departments->getList();

            $data['header'] = $this->header->show($data['title']);
            $data['column_left'] = $this->column_left->show();

            if ($this->request->has('update'))
            {
                $data['title'] = 'Изменение сотрудника';
                $data['employee_data'] = $this->employee->getItem( (int)$this->request->get('update') );
                foreach ($this->departments->getList( (int)$this->request->get('update') ) as $department)
                {
                    $data['employee_departments'][] = $department['id'];
                }

                $data['header'] = $this->header->show($data['title']);

                $this->page('employee/update-form', $data);
            }

            $this->page('employee/create-form', $data);
        }

        public function render($view, $data)
        {
            $data['header'] = $this->header->show($data['title'] ?? '');
            $data['column_left'] = $this->column_left->show();

            return view($view, $data);
        }
    }