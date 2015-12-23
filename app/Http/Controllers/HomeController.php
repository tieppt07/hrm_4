<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;

class HomeController extends Controller
{
    protected $userRepository;
    protected $departmentRepository;
    protected $positionRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository, DepartmentRepository $departmentRepository, PositionRepository $positionRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->departmentRepository = $departmentRepository;
        $this->positionRepository = $positionRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departmentRepository->listsDepartments();
        $positions = $this->positionRepository->listsPositions();
        $users = $this->userRepository->paginate();
        $users->load(['department', 'position']);
        return view('home', ['users' => $users, 'departments' => $departments, 'positions' => $positions]);
    }
}
