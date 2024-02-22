<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SURPLACE
 *
 * @property int $IDCOMMANDE
 * @property int $ID_USER
 * @property string|null $NUMTABLE
 *
 * @property BARMAN $b_a_r_m_a_n
 * @property COMMANDE $c_o_m_m_a_n_d_e
 *
 * @package App\Models
 */
class SURPLACE extends Model
{
	protected $table = 'SURPLACE';
    protected $with = ['barman','commande'];
	protected $primaryKey = 'IDCOMMANDE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDCOMMANDE' => 'int',
		'ID_USER' => 'int'
	];

	protected $fillable = [
		'ID_USER',
		'NUMTABLE'
	];

	public function barman()
	{
		return $this->belongsTo(BARMAN::class, 'ID_USER');
	}

	public function commande()
	{
		return $this->belongsTo(COMMANDE::class, 'IDCOMMANDE');
	}
}
