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

    public function update($id, array $data){
          Cache::forget('employee_departments');
         return $this->department->findOrFail($id)->update($data);
    }
    //--------------------------------------------------------------------------------------
    public function findById($id){
        return $this->department->findOrFail($id);
    }
//--------------------------------------------------------------------------------------------
    public function delete($id) {
          Cache::forget('employee_departments');
        return $this->department->findOrFail($id)->delete();
    }
//------------------------------------------------------------------------------------
    public function getDepartments(){
        return Cache::remember('employee_departments', 3600, function () {
          return Department::all();

        });
    }
}
