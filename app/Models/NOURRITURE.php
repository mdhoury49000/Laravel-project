<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NOURRITURE
 *
 * @property int $ID_PRODUIT
 * @property int|null $POIDS
 *
 * @property PRODUIT $p_r_o_d_u_i_t
 *
 * @package App\Models
 */
class NOURRITURE extends Model
{
    use HasFactory;
	protected $table = 'NOURRITURE';
	protected $primaryKey = 'ID_PRODUIT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PRODUIT' => 'int',
		'POIDS' => 'int'
	];

	protected $fillable = [
		'POIDS'
	];
   //protected $with = ['stocker'];
	public function p_r_o_d_u_i_t()
	{
		return $this->belongsTo(PRODUIT::class, 'ID_PRODUIT');
	}
}
