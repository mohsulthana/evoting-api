<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Kandidat extends ResourceController
{
  protected $modelName = 'App\Models\Kandidat_model';
  protected $format = 'json';

  public function index()
  {
    $params_query = $this->request->getGet();
    $kandidat = $this->model->like($params_query)->get()->getResultArray();
    return $this->respond($kandidat);
  }

  public function show($id = NULL)
  {
    $record = $this->model->find($id);
    if (!$record) {
      return $this->failNotFound(sprintf(
        'Siswa dengan id %d tidak ditemukan',
        $id
      ));
    }

    return $this->respond($record);
  }

  public function create()
  {
    $data = $this->request->getPost();
    $foto = $this->request->getFile('foto');
    $data['foto'] = $foto->getName();

    if (!$this->model->save($data))
    {
      return $this->fail($this->model->errors());
    }

    $id = $this->model->getInsertID();

    if (!is_dir(FCPATH . 'uploads/kandidat/' . $id)) {
      mkdir(FCPATH . 'uploads/kandidat/' . $id, 0777, true);
    }

    if ($foto->isValid() && ! $foto->hasMoved())
    {
      $foto->move(FCPATH . 'uploads/kandidat/' . $id, $foto->getName());
    }

    return $this->respondCreated($data, "Kandidat berhasil dibuat");
  }

  public function delete($id = null)
  {
    $this->model->delete($id);
    if ($this->model->db->affectedRows() === 0)
    {
      return $this->failNotFound(sprintf(
        'Siswa dengan id %d tidak ditemukan',
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
        'Siswa dengan id %d tidak ditemukan',
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