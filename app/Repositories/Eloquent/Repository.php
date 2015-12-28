<?php 

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

/**
 * Class Repository
 * @package App\Repositories\Eloquent
 */
abstract class Repository extends BaseRepository
{
    /**
    * Find data by field and value
    *
    * @param $field
    * @param $value
    * @param array $columns
    * @return mixed
    */
    public function findByField($field, $value = null, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->where($field,'=',$value);
        $this->resetModel();
        return $this->parserResult($model);
    }
}
