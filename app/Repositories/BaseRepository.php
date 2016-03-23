<?php 

namespace App\Repositories;

use App\Exceptions\RepositoryException;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;


abstract class  BaseRepository {

    /**
     * @var App
     */
    private $app;

    /**
     * @var Model
     */
    public $model;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param App $app
     * @throws \App\Exceptions\RepositoryException
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @param array $data
     * @return mixed
     */
    public function newModel(array $data = array())
    {
        $model = $this->model->getModel();
        $model->fill($data);

        return $model;
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        return $this->model->get($columns);
    }

    /**
     * @param string $column
     * @param string|null $key
     * @return mixed
     */
    function lists($column = "name", $key = "id"){
        return $this->model->lists($column, $key);
    }

    /**
     * @param string $column
     * @param string|null $key
     * @param string $title
     * @return mixed
     */
    function listsSelect($column = "name", $key = "id", $title = "option_select"){
        if(is_null($title)){
            \Lang::get($title);
        }

        return $this->model->lists($column, $key)->all();
    }

    /**
     * @return int
     */
    public function count() {
        return $this->model->count();
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*')) {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        if(Auth::check() &&  !array_key_exists('created_by', $data)) {
            $data['created_by'] = Auth::user()->id;
        }

        if(Auth::check() &&  !array_key_exists('user_id', $data)) {
            $data['user_id'] = Auth::user()->id;
        }

        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param Model $entity
     * @return mixed
     */
    public function update(array $data, $entity) {
        $entity->fill($data);

        if($entity->save()) {
            return $entity;
        }

        return false;
    }

    /**
     * @param Model $entity
     * @return mixed
     */
    public function delete($entity) {
        return $entity->delete();
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        return $this->model->find($id, $columns);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, array $columns = array('*')) {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * Find a model by its primary key or return fresh model instance.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findOrNew($id, $columns = ['*'])
    {
        return $this->model->findOrNew($id, $columns);
    }

    /**
     * Find a model by its primary key or create the model
     * @param $id
     * @param array $data
     * @return Model
     */
    public function findOrCreate($id, array $data)
    {
        $model = $this->findOrNew($id);

        if(! $model->exists) {
            $model->fill($data);
            $model->save();
        }

        return $model;
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return Model|null|static
     */
    public function findBy($attribute, $value, $columns = array('*')) {
        return $this->builder->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFailBy($attribute, $value, array $columns = array('*')) {
        $model = $this->findBy($attribute, $value, $columns);

        if(is_null($model)){
            throw (new ModelNotFoundException)->setModel(get_class($this->model));
        }

        return $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel() {
        $this->model = $this->app->make($this->model());

        if (!$this->model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->builder = $this->model->newQuery();
    }
}