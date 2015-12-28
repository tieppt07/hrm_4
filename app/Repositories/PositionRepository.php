<?php 

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;
use App\Models\Position;

class PositionRepository extends Repository
{
	/**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Position::class;
    }

    public function listsPositions()
    {
    	return Position::lists('name', 'id');
    }
}
