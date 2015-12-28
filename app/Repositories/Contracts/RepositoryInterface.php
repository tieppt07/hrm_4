<?php 

namespace App\Repositories\Contracts;

interface RepositoryInterface 
{
    public function all($columns = ['*']);
    public function paginate($perPage = null, $columns = ['*']);
    public function where($field, $value, $columns = ['*']);
    public function find($id, $columns = ['*']);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
