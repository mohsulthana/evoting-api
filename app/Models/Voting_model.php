<?php

namespace App\Models;

use CodeIgniter\Model;

class Voting_model extends Model
{
  protected $table = 'voting';
  protected $primaryKey = 'id';

  protected $allowedFields = [
    'id_pasangan',
    'id_user',
    'tanggal_voting'
  ];

  protected $validationRules = [
    'id_pasangan' => 'required',
    'id_user' => 'required|is_unique[voting.id_user]',
    'tanggal_voting' => 'required'
  ];

  protected $validationMessages = [
    'id_user'        => [
      'is_unique' => 'Anda sudah melakukan voting sekali.'
    ]
  ];
}