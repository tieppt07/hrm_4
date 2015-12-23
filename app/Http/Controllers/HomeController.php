<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use App\Position;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::lists('name', 'id');
        $positions = Position::lists('name', 'id');
        $users = User::all()->load(['department', 'position']);
        return view('home', ['users' => $users, 'departments' => $departments, 'positions' => $positions]);
    }
}
