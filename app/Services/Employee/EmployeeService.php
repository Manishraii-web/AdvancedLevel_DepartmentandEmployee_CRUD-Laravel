<?php

namespace App\Services\Employee;

use App\Models\Employee;

class EmployeeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Employee $employee) {}
    //-------------------------------------------------------------------------------------------------------------
    public function getall()
    {
        return $this->employee
        ->where('is_approved', true)
            ->when(request('search'), function ($query) {
                $query->where('firstname', 'like', '%' . request('search') . '%')
                     ->orwhere('lastname', 'like', '%' . request('search'). '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            })
            ->orderBy('created_at', 'asc')
            ->paginate(3);
    }
    //--------------------------------------------------------------------------------------------
    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']
                ->store('employees', 'public');
        }
        return $this->employee->create($data);
    }
    //--------------------------------------------------------------------------------------------
    public function update(Employee $employee, array $data): bool
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']
                ->store('employees', 'public');
        }
        return $employee->update($data);
    }
    //--------------------------------------------------------------------------------------------
    public function delete(Employee $employee): bool
    {
        return $employee->delete();
    }
    //-------------------------------------------------------------------------------------------
    public function getPendingEmployees(){
        return Employee::where('is_approved',false)->get();
    }
    //---------------------------------------------------------------------------
    public function approve(Employee $employee): bool {
        return $employee->update([
            'is_approved' => true
        ]);
    }
}
