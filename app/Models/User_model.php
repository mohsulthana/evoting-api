<?php
namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'id';

	protected $allowedFields = [
		'nama',
		'username',
		'password',
    'role',
    'created_at',
    'updated_at'
	];

	protected $validationRules = [
		'nama'		=> 'required',
		'username'	=> 'required',
		'password'	=> 'required',
		'role'		=> 'required'
	];

	protected $useTimestamps = true;
}