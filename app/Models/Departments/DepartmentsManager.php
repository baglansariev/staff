<?php
    namespace App\Models\Departments;
    use App\Models\DataManager;

    class DepartmentsManager implements DataManager
    {
        public function getItem($department_id)
        {
            return Departments::all()->where('id', (int)$department_id);
        }

        public function getList($employee_id = false)
        {
            if ($employee_id)
            {
                $departments_list = Departments::query()
                    ->select('*')
                    ->leftJoin('employee_to_department', 'employee_to_department.department_id', '=', 'departments.id')
                    ->where('employee_to_department.employee_id', (int)$employee_id)
                    ->get();

                return $departments_list;
            }
            return Departments::all();
        }

        public function create($department_name = false)
        {
            Departments::query()->insert(['name' => $department_name]);
        }

        public function update($department = array())
        {
            Departments::query()
                ->where('id', $department['id'])
                ->update(['name' => $department['name']]);
        }

        public function delete($department_id)
        {
            Departments::query()->where('id', $department_id)->delete();
        }
    }