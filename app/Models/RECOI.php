<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RECOI
 * 
 * @property int $ID_BAR
 * @property int $IDCOMMANDE
 * 
 * @property BAR $b_a_r
 * @property COMMANDE $c_o_m_m_a_n_d_e
 *
 * @package App\Models
 */
class RECOI extends Model
{
	protected $table = 'RECOIS';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_BAR' => 'int',
		'IDCOMMANDE' => 'int'
	];

	public function b_a_r()
	{
		return $this->belongsTo(BAR::class, 'ID_BAR');
	}

	public function c_o_m_m_a_n_d_e()
	{
		return $this->belongsTo(COMMANDE::class, 'IDCOMMANDE');
	}
}
