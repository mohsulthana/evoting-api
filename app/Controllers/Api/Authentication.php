<?php

namespace App\Controllers\Api;

use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Authentication extends ResourceController
{
  protected $modelName    = 'App\Models\User_model';
  protected $format       = 'json';

  public function login()
  {    
    $data = $this->request->getJSON(TRUE);
    
    if(empty($data['username']) || empty($data['password'])) {
      return $this->failUnauthorized();
    }

    $record = $this->model->where('username', $data['username'])->first();
    
    if($record) {
      $check = password_verify($data['password'], $record['password']);
      
      if($check) {
        $role = '';
        switch ($record['role']) {
          case 1:
            $role = 'admin';
            break;
          case 2:
            $role = 'siswa';
            break;
          case 3:
            $role = 'guru';
            break;
          default:            
            break;
        }       
        $payload_scopes = [
        'username'  => $record['username'],
        'password'  => $record['password'],
        'nama'    => $record['nama'],
        'role'    => $role
        ];
        return $this->respond([
          'msg' => "berhasil masuk"
        ]);
      }       
    }       
    return $this->failUnauthorized();
  }
}