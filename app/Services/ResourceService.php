<?php 

namespace App\Services;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ResourceService {

    /**
     * @var BaseRepository
     */
	protected $repository;
    
    public function listModels()
    {
        return $this->repository->paginate();
    }

    public function newModel(array $data = array())
    {
        return $this->repository->newModel($data);
    }

    public function createModel(array $data)
    {
    	return $this->repository->create($data);
    }

    /**
     * @param array $data
     * @param Model $entity
     * @return mixed
     */
    public function updateModel(array $data, Model $entity)
    {
    	return $this->repository->update($data, $entity);
    }

    public function deleteModel($entity)
    {
        return $this->repository->delete($entity);
    }
}