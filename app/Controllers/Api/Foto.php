<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Foto extends ResourceController
{
  protected $modelName = 'App\Models\Foto_model';
  protected $format = 'json';

  public function index()
  {
    $params_query = $this->request->getGet();
    $pasangan = $this->model->like($params_query)->get()->getResultArray();
    return $this->respond($pasangan);
  }