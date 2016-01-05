<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\DepartmentRepository;
use Validator;

class DepartmentsController extends Controller
{
    protected $departmentRepository;

    /**
     * Create a new controller instance.
     *
     * @param DepartmentRepository $departmentRepository
     */
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departmentRepository->paginate();
        return view('departments', ['departments' => $departments]);
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
            'name' => 'required|max:255|unique:departments',
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $department = $this->departmentRepository->create($request->all());
            return redirect('departments');
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
            'name' => 'required|max:255|unique:departments,name,' . $id,
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $department = $this->departmentRepository->update($request->except(['_method', '_token']), $id);
            return redirect('departments');
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
        $department = $this->departmentRepository->delete($id);
        return redirect('departments');
    }
}
