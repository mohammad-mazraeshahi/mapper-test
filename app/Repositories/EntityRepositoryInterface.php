<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface EntityRepositoryInterface
{
    public function all();

    public function getById($id);

    public function get($query);

    public function update($id,Model $model);

    public function delete($id);

    public function create(Model $model);
}
