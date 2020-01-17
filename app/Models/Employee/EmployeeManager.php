<?php
    namespace App\Models\Employee;
    use App\Models\DataManager;
    use Illuminate\Support\Facades\DB;

    class EmployeeManager implements DataManager
    {
        public function getItem($employee_id)
        {
            $employee = Employee::all()
                ->where('id', (int)$employee_id);
            return $employee;
        }

        public function getList($department_id = false)
        {
            if ($department_id)
            {
                $employee_list =  Employee::query()
                    ->select('*')
                    ->leftJoin('employee_to_department', 'employee_to_department.employee_id', '=', 'employee.id')
                    ->where('employee_to_department.department_id', (int)$department_id)
                    ->get();

                return $employee_list;
            }

            return Employee::all();
        }

        public function create($employee = array(), $department = array())
        {
            Employee::query()
                ->insert([
                    'name' => $employee['name'],
                    'second_name' => $employee['second_name'],
                    'last_name' => $employee['last_name'],
                    'gender' => $employee['gender'],
                    'salary' => $employee['salary'],
                    ]);

            foreach ($department as $item)
            {
                $employee_id = Employee::query()
                    ->select('id')
                    ->where('name', '=', $employee['name'])
                    ->where('second_name', '=', $employee['second_name'])
                    ->where('salary', '=', $employee['salary'])
                    ->first();

                DB::table('employee_to_department')
                    ->insert([
                        'department_id' => $item,
                        'employee_id' => json_decode($employee_id->id)
                    ]);
            }
        }

        public function update($employee = array(), $department = array())
        {
            Employee::query()
                ->where('id', $employee['id'])
                ->update([
                    'name' => $employee['name'],
                    'second_name' => $employee['second_name'],
                    'last_name' => $employee['last_name'],
                    'gender' => $employee['gender'],
                    'salary' => $employee['salary'],
                ]);
            DB::table('employee_to_department')
                ->where('employee_id', $employee['id'])
                ->delete();

            foreach ($department as $id)
            {
                DB::table('employee_to_department')
                    ->insert([
                        'department_id' => $id,
                        'employee_id' => $employee['id'],
                    ]);
            }
        }

        public function delete($employee_id)
        {
            Employee::query()->where('id', $employee_id)->delete();
            DB::table('employee_to_department')->where('employee_id', $employee_id)->delete();
        }
    }