<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 8/3/2017
 * Time: 11:14 μμ
 */

namespace Umbrellapp\Repositories\Eloquent;


use Umbrellapp\Repositories\Contracts\BaseRepositoryInterface;

abstract class Repository implements BaseRepositoryInterface
{
    /**
     * @var $model : repository model
     */
    protected $model;

    /**
     */
    public function __construct()
    {
        $this->model = $this->model();
    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $field, $value)
    {
        $item = $this->model->where($field, $value);
        if ($item) return $item->update($data);
        return null;
    }

    public function delete($id)
    {
        $item = $this->model->find($id);
        if ($item) return $item->delete();
        return null;
    }

    public function deleteBy($field, $value)
    {
        $item = $this->model->where($field, $value)->first();
        if ($item) return $item->delete();
        return null;
    }

    public function findById($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($field, $value, $columns = array('*'))
    {
        return $this->model->where($field, $value)->first($columns);
    }

    public function findManyBy($field, $value, $columns = array('*'))
    {
        return $this->model->where($field, $value)->get($columns);
    }

    public function findLike($field, $value, $columns = array('*'))
    {
        return $this->model->where($field, 'like', '%' . $value . '%')->get($columns);
    }

    public function findIn($field, array $values, $columns = array('*'))
    {
        return $this->model->whereIn($field, $values)->get($columns);
    }
}