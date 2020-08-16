<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Voting extends ResourceController
{
  protected $modelName = 'App\Models\Voting_model';
  protected $format = 'json';

  public function index()
  {
    $params_query = $this->request->getGet();
    $kandidat = $this->model->select('kandidat.nama AS `Nama Ketua`, voting.id_pasangan AS `ID Pasangan`, pasangan.no_urut AS `No Urut`')->selectCount('id_pasangan', 'Jumlah')->join('pasangan', 'pasangan.id = voting.id_pasangan')->join('kandidat', 'kandidat.id = pasangan.id_ketua')->groupBy('id_pasangan')->get()->getResultArray();
    return $this->respond($kandidat);
  }

  public function create()
  {
    $data = $this->request->getJSON();

    if (!$this->model->save($data))
    {
      return $this->fail($this->model->errors());
    }

    return $this->respondCreated($data);
  }
}