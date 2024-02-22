<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CATEGORISER
 * 
 * @property int $ID_PRODUIT
 * @property int $ID_ALLERGENE
 * 
 * @property ALLERGENE $a_l_l_e_r_g_e_n_e
 * @property PRODUIT $p_r_o_d_u_i_t
 *
 * @package App\Models
 */
class CATEGORISER extends Model
{
	protected $table = 'CATEGORISER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PRODUIT' => 'int',
		'ID_ALLERGENE' => 'int'
	];

	public function a_l_l_e_r_g_e_n_e()
	{
		return $this->belongsTo(ALLERGENE::class, 'ID_ALLERGENE');
	}

	public function p_r_o_d_u_i_t()
	{
		return $this->belongsTo(PRODUIT::class, 'ID_PRODUIT');
	}
}
