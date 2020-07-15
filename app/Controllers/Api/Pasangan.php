<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Pasangan extends ResourceController
{
  protected $modelName = 'App\Models\Pasangan_model';
  protected $format = 'json';

  public function index()
  {
    $params_query = $this->request->getGet();         
    $pasangan = $this->model->like($params_query)->get()->getResultArray();
    return $this->respond($pasangan);
  }

  public function show($id = NULL)
  {
    $record = $this->model->find($id);
    if (!$record) {
      return $this->failNotFound(sprintf(
        'Pasangan dengan id %d tidak ditemukan',
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

  public function delete($id = null)
  {
    $this->model->delete($id);
    if ($this->model->db->affectedRows() === 0)
    {
      return $this->failNotFound(sprintf(
        'Pasangan dengan id %d tidak ditemukan',
        $id
      ));
    }

    return $this->respondDeleted(['id' => $id]);
  }

  public function update($id = null)
  {
    $data    = $this->request->getJSON();      
    $record  = $this->model->find($id);
    if(empty($record)) {
      return $this->failNotFound(sprintf(
        'Pasangan dengan id %d tidak ditemukan',
        $id
      ));
    } 
    if($this->model->update($id, $data) === FALSE)
    {
      return $this->fail($this->model->errors());
    }
    $data->id = $id;
    return $this->respond($data);
  }
}
