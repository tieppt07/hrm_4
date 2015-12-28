<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use Validator;

class UsersController extends Controller
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
    public function index(Request $request)
    {
        $departments = $this->departmentRepository->listsDepartments();
        $positions = $this->positionRepository->listsPositions();
        if ($request->get('department')) {
            $users = $this->userRepository->findByField('department_id', $request->get('department'))->paginate();
            $users->load(['department', 'position']);
            $departmentId = $request->get('department');
            return view('users', ['users' => $users, 'departments' => $departments, 'positions' => $positions, 'departmentId' => $departmentId]);
        }
        $users = $this->userRepository->paginate();
        $users->load(['department', 'position']);
        return view('users', ['users' => $users, 'departments' => $departments, 'positions' => $positions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $user = $this->userRepository->create($request->all());
            return redirect('users');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $user = $this->userRepository->update($request->except(['_method', '_token']), $id);
            return redirect('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->delete($id);
        return redirect('users');
    }
}
