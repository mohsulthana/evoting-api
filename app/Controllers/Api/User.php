<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class User extends ResourceController
{
  protected $modelName = 'App\Models\User_model';
  protected $format = 'json';

  public function index()
  {
    $params_query = $this->request->getGet();
    $user = $this->model->like($params_query)->get()->getResultArray();
    return $this->respond($user);
  }

  public function show($id = NULL)
  {
    $record = $this->model->find($id);
    if (!$record)
    {
      return $this->failNotFound(sprintf(
        'User dengan id %d tidak ditemukan',
        $id
      ));
    }

    return $this->respond($record);
  }

  public function create()
  {
    $data = $this->request->getJSON();

    if (!$this->model->save($data))
    {
      return $this->fail($this->model->errors());
    }
    $data->id = $this->model->getInsertID();
    return $this->respondCreated($data);
  }
}