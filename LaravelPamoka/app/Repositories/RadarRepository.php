<?php

namespace App\Repositories;

use App\Radar;

class RadarRepository 
{
    protected $entity;
    
    public function __construct(Radar $entity)
    {
        $this->entity = $entity;
    }

    public function findById(int $id)
    {
        return $this->entity->find($id);
    }

    public function getAllWithTrashed(int $pageSize)
    {
        return $this->entity
        ->withTrashed()
        ->orderBy('number','desc')
        ->paginate($pageSize);
    }

    public function create(array $array)
    {
        $this->entity->create($array);
    }

    public function update(int $id, array $array)
    {
        $radar = $this->findById($id);
        
        return $radar->update($array);
    }

    public function deleteById($id)
    {
        return $this->findById($id)->delete();
    }

    public function restoreById($id)
    {
        return $this->entity->onlyTrashed()->find($id)->restore();
    }
}