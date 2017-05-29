<?php
namespace Mvc;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base_Model extends Model{

	use SoftDeletes;

	const CREATED_AT = 'cadastrado';
	const UPDATED_AT = 'atualizado';
	const DELETED_AT = 'excluido';

}
