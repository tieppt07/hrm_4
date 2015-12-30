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
}
