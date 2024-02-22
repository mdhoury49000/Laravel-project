<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class COMPOSER
 *
 * @property int $IDCOMMANDE
 * @property int $ID_PRODUIT
 * @property int|null $QUANTITE
 *
 * @property COMMANDE $c_o_m_m_a_n_d_e
 * @property PRODUIT $p_r_o_d_u_i_t
 *
 * @package App\Models
 */
class COMPOSER extends Model
{
	protected $table = 'COMPOSER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDCOMMANDE' => 'int',
		'ID_PRODUIT' => 'int',
		'QUANTITE' => 'int'
	];

	protected $fillable = [
		'QUANTITE'
	];
    protected $with = ['produit'];
	public function commande()
	{
		return $this->belongsTo(COMMANDE::class, 'IDCOMMANDE');
	}

	public function produit()
	{
		return $this->belongsTo(PRODUIT::class, 'ID_PRODUIT');
	}
}
