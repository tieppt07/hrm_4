<?php 

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;
use App\Models\Department;

class DepartmentRepository extends Repository
{
	/**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Department::class;
    }

    public function listsDepartments()
    {
    	return Department::lists('name', 'id');
    }
}
