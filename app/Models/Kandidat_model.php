<?php

namespace App\Models;

use CodeIgniter\Model;

class Kandidat_model extends Model
{
  protected $table = 'kandidat';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'id',
    'nama',
    'nis',
    'visi',
    'misi',
    'tanggal_lahir',
    'kelas',
    'pengalaman',
    'foto',
    'hasil_vote'
  ];

  protected $validationRules = [
    'id'	=> 'required',
    'nama'		=> 'required',
    'nis'		=> 'required',
    'visi'		=> 'required',
    'misi'		=> 'required',
    'tanggal_lahir'				=> 'required',
    'kelas'				=> 'required',
    'pengalaman'		=> 'required',
    'foto'		=> 'required',
    'hasil_vote'		=> 'required'
  ];
}