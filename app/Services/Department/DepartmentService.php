<?php

namespace App\Services\Department;
use App\Models\Department;
use Illuminate\Support\Facades\Cache;

class DepartmentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Department $department) { }
//---------------------------------------------------------------------------------------------
    public function getAll(){
        return $this->department
        ->when(request('search'), function($query){
            $query->where('name', 'like', '%'.request('search').'%');
        })
        ->orderBy('created_at', 'asc')
        ->paginate(3);
    }
    //--------------------------------------------------------------------------------------------
    public function store(array $data) {
         Cache::forget('employee_departments');
        return $this->department->create($data);
    }
    //----------------------------------------------------------------------------------------

    public function update(Department $department, array $data): bool{
          Cache::forget('employee_departments');
         return $department->update($data);
    }
//--------------------------------------------------------------------------------------------
    public function delete(Department $department): bool {
          Cache::forget('employee_departments');
        return $department->delete();
    }
//------------------------------------------------------------------------------------
    public function getDepartments(){
        return Cache::remember('employee_departments', 3600, function () {
          return Department::all();

        });
    }
}
