<?php

namespace Umbrellapp\Repositories\Contracts;

/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 8/3/2017
 * Time: 11:20 μμ
 */
interface BaseRepositoryInterface
{
    public function all($columns = array('*'));

    public function create(array $data);

    public function update(array $data, $field, $value);

    public function delete($id);

    public function deleteBy($field, $value);

    public function findById($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));

    public function findManyBy($field, $value, $columns = array('*'));

    public function findLike($field, $value, $columns = array('*'));

    public function findIn($field, array $values, $columns = array('*'));
}