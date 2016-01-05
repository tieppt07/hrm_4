<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\PositionRepository;
use App\Repositories\UserRepository;
use App\Models\User;
use Validator;

class PositionsController extends Controller
{
    protected $positionRepository;
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @param PositionRepository $positionRepository
     * @param UserRepository $userRepository
     */
    public function __construct(PositionRepository $positionRepository, UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->positionRepository = $positionRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = $this->positionRepository->paginate();
        return view('positions', ['positions' => $positions]);
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
            'name' => 'required|max:255|unique:positions',
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $position = $this->positionRepository->create($request->all());
            return redirect('positions');
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
            'name' => 'required|max:255|unique:positions,name,' . $id,
        ]);
        if ($valid->fails()) {
            return back()->withErrors($valid->errors());
        } else {
            $position = $this->positionRepository->update($request->except(['_method', '_token']), $id);
            return redirect('positions');
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
        $position = $this->positionRepository->delete($id);
        return redirect('positions');
    }
}
