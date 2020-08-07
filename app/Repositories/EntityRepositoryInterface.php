<?php


namespace App\Repositories;


interface EntityRepositoryInterface
{
    public function all();

    public function getById($id);

    public function get($query);

    public function update($id,$param);

    public function delete($id);
}
