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

    public function searchStaff($key)
    {
        $users = User::where('name', 'like', "%$key%")
                        ->orWhere('email', 'like', "%$key%")
                        ->orWhere('phone', 'like', "%$key%")
                        ->orderBy('name')
                        ->paginate();
        $users->load(['department', 'position']);
        return $users;
    }

    public function advancedSearch($key, $departmentsId, $positionsId)
    {
        $users = User::where(function ($query) use ($key) {
                                $query->where('name', 'like', "%$key%")
                                      ->orWhere('email', 'like', "%$key%")
                                      ->orWhere('phone', 'like', "%$key%");
                            })
                     ->where(function ($query) use ($departmentsId, $positionsId) {
                                 if ($departmentsId) {
                                     $query->whereIn('department_id', $departmentsId);
                                 }
                                 if ($positionsId) {
                                     $query->whereIn('position_id', $positionsId);
                                 }
                            })
                     ->orderBy('name')
                     ->paginate();
        $users->load(['department', 'position']);
        return $users;
    }
}
