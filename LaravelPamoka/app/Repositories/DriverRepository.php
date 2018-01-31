<?php

namespace App\Repositories;

use App\Driver;

class DriverRepository
{
   protected $entity;
   
   public function __construct(Driver $entity)
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
       ->orderBy('name','desc')
       ->paginate($pageSize);
   }

   public function create(array $array)
   {
       $this->entity->create($array);
   }

   public function update(int $id, array $array)
   {
        $driver = $this->findById($id);
        
        return $driver->update($array);
   }

   public function deleteById($id)
   {
       $this->findById($id)->delete();
   }

   public function restoreById($id)
   {
        return $this->entity->onlyTrashed()->find($id)->restore();

   }
   
}
