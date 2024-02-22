<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TYPEBAR
 *
 * @property int $ID_TYPE
 * @property string|null $NOM_TYPE
 *
 * @property Collection|BAR[] $b_a_r_s
 *
 * @package App\Models
 */
class TYPEBAR extends Model
{
	protected $table = 'TYPEBAR';
	protected $primaryKey = 'ID_TYPE';
	public $timestamps = false;

	protected $fillable = [
		'NOM_TYPE'
	];

	public function bars()
	{
		return $this->hasMany(BAR::class, 'ID_TYPE');
	}
}
