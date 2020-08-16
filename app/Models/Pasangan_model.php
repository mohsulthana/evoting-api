<?php

namespace App\Models;

use CodeIgniter\Model;

class Pasangan_model extends Model
{
  protected $table = 'pasangan';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'id_ketua',
    'id_wakil',
    'visi',
    'misi',
    'no_urut'
  ];

  protected $validationRules = [
    'id_ketua'		=> 'required',
    'id_wakil' => 'required',
    'visi'		=> 'required',
    'misi'		=> 'required',
    'no_urut' => 'required'
  ];
}