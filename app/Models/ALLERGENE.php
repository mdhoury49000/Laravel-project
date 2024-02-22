<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ALLERGENE
 * 
 * @property int $ID_ALLERGENE
 * @property string|null $LIBALLERGENE
 * 
 * @property Collection|CATEGORISER[] $c_a_t_e_g_o_r_i_s_e_r_s
 *
 * @package App\Models
 */
class ALLERGENE extends Model
{
	protected $table = 'ALLERGENE';
	protected $primaryKey = 'ID_ALLERGENE';
	public $timestamps = false;

	protected $fillable = [
		'LIBALLERGENE'
	];

	public function c_a_t_e_g_o_r_i_s_e_r_s()
	{
		return $this->hasMany(CATEGORISER::class, 'ID_ALLERGENE');
	}
}
