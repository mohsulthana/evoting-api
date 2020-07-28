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

  public function getVoting()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('voting');

    return $builder->selectCount('id_pasangan')->groupBy('id_pasangan')->get();
  }
}