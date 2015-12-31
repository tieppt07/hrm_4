<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\PositionRepository;
use App\Repositories\DepartmentRepository;

class SearchController extends Controller
{
    protected $userRepository;
    protected $departmentRepository;
    protected $positionRepository;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $userRepository
     * @param DepartmentRepository $departmentRepository
     * @param PositionRepository $positionRepository
     */
    public function __construct(UserRepository $userRepository, DepartmentRepository $departmentRepository, PositionRepository $positionRepository)
    {
        $this->userRepository = $userRepository;
        $this->departmentRepository = $departmentRepository;
        $this->positionRepository = $positionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('key')) {
            $departments = $this->departmentRepository->listsDepartments();
            $positions = $this->positionRepository->listsPositions();
            $key = $request->get('key');
            $departmentId = $request->get('department');
            $positionId = $request->get('position');
            $users = $this->userRepository->searchStaff($key, $departmentId, $positionId);
            return view('search', ['users' => $users, 'departments' => $departments, 'positions' => $positions, 'key' => $key, 'departmentId' => $departmentId, 'positionId' => $positionId]);
        }
        return redirect('users');
    }
}
