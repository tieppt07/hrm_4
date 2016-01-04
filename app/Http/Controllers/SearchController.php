<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;

class SearchController extends Controller
{
    protected $userRepository;
    protected $positionRepository;
    protected $departmentRepository;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $userRepository
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
        if ($request->has('key')) {
            $departments = $this->departmentRepository->all(['name', 'id']);
            $positions = $this->positionRepository->all(['name', 'id']);
            $key = $request->get('key');
            if ($request->has('department') || $request->has('position')) {
                $departmentsId = $request->get('department');
                $positionsId = $request->get('position');
                $users = $this->userRepository->advancedSearch($key, $departmentsId, $positionsId);
                return view('search', ['users' => $users, 'key' => $key, 'positions' => $positions, 'departments' => $departments, 'departmentsId' => $departmentsId, 'positionsId' => $positionsId]);
            }
            $users = $this->userRepository->searchStaff($key);
            return view('search', ['users' => $users, 'key' => $key, 'positions' => $positions, 'departments' => $departments]);
        }
        return redirect('users');
    }
}
