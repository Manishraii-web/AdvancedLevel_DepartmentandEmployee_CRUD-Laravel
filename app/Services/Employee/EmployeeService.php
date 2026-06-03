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
            ->when(request('department_id'), function ($query){
                $query->where('department_id', request('department_id'));
            })
            ->when(
                request('sort') == 'oldest',
                fn($query) =>$query->orderBy('created_at', 'asc'),
                fn($query) =>$query->orderBy('created_at', 'desc')
            )
            ->paginate(3);
    }
    //-------------------------------------------------------------------------------------------------------------
    public function getAllApproved()
    {
        return $this->employee
            ->with('department')
            ->where('is_approved', true)
            ->orderBy('created_at', 'asc')
            ->get();
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
    public function update($id, array $data)
    {
        $employee= $this->employee->find($id);
        if (isset($data['image'])) {
            $data['image'] = $data['image']
                ->store('employees', 'public');
        }
        return $employee->update($data);
    }
    //--------------------------------------------------------------------------------------------
    public function delete($id)
    {
        return $this->employee->findOrFail($id)->delete();
    }
    //-------------------------------------------------------------------------------------------
    public function getPendingEmployees(){
        return Employee::where('is_approved',false)->get();
    }
    //---------------------------------------------------------------------------
    public function approve($id) {
        return $this->employee->findOrFail($id)->update([
            'is_approved' => true
        ]);
    }
    //---------------------------------------------------------------------------------
    public function find($id) {
        return Employee::findOrFail($id);
    }
}
