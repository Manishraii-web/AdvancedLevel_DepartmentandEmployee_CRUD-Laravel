<?php

namespace App\Services\Department;
use App\Models\Department;
class DepartmentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Department $department) { }
//---------------------------------------------------------------------------------------------
    public function getall(){
        return $this->department
        ->when(request('search'), function($query){
            $query->where('name', 'like', '%'.request('search').'%');
        })
        ->orderBy('created_at', 'asc')
        ->paginate(3);
    }
    //--------------------------------------------------------------------------------------------
    public function store(array $data): Department {
        return $this->department->create($data);
    }
    //----------------------------------------------------------------------------------------

    public function update(Department $department, array $data): bool{
         return $department->update($data);
    }
//--------------------------------------------------------------------------------------------
    public function delete(Department $department): bool {
        return $department->delete();
    }

}

