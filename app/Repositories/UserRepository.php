<?php 

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;
use App\Models\User;

class UserRepository extends Repository
{
	/**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return User::class;
    }

    public function searchStaff($key, $departmentId, $positionId)
    {
        $users = User::where(function ($query) use ($key) {
                            $query->where('name', 'like', "%$key%")
                                 ->orWhere('email', 'like', "%$key%")
                                 ->orWhere('phone', 'like', "%$key%");
                       })
                     ->where(function ($query) use ($departmentId, $positionId) {
                            $query->where('department_id', '=', $departmentId)
                                  ->where('position_id', '=', $positionId);
                       })
                     ->orderBy('name')
                     ->paginate();
        $users->load(['department', 'position']);
        return $users;
    }
}
