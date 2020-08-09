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
    'visi',
    'misi',
    'kelas',
    'pengalaman',
    'foto'
  ];

  protected $validationRules = [
    'nama'		=> 'required',
    'nis'		=> 'required',
    'visi'		=> 'required',
    'misi'		=> 'required',
    'kelas'				=> 'required',
    'pengalaman'		=> 'required',
    'foto'		=> 'required'
  ];
}