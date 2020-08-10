<?php

namespace App\Models;

use CodeIgniter\Model;

class Kandidat_model extends Model
{
  protected $table = 'kandidat';
  protected $primaryKey = 'id';

  protected $allowedFields = [
    'nama',
    'nis',
    'kelas',
    'pengalaman',
    'foto'
  ];

  protected $validationRules = [
    'nama'		=> 'required',
    'nis'		=> 'required',
    'kelas'				=> 'required',
    'pengalaman'		=> 'required',
    'foto'		=> 'required'
  ];
}