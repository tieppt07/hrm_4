<?php 

namespace App\Http\Controllers;

use App\Repositories\UserRepository as User;
use App\Department;

class UsersController extends Controller 
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user) 
    {
        $this->user = $user;
    }

    public function index() 
    {   
        $departments = Department::lists('name', 'id');
        $staffs = $this->user->paginate(10);
        return view('home', ['staffs' => $staffs, 'departments' => $departments]);
    }

    public function show($id) 
    {
        return \Response::json($this->user->find($id));
    }
}
