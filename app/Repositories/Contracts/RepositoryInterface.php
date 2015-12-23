<?php 

namespace App\Repositories\Contracts;

interface RepositoryInterface 
{
    public function all($columns = ['*']);
    public function paginate($perPage = null, $columns = ['*']);
}
