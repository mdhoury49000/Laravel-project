<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BOISSON
 *
 * @property int $ID_PRODUIT
 * @property bool|null $ESTALCOOLISE
 * @property int|null $DEGREALCOOL
 * @property int|null $VOLUME
 *
 * @property PRODUIT $p_r_o_d_u_i_t
 *
 * @package App\Models
 */
class BOISSON extends Model
{
    use HasFactory;
	protected $table = 'BOISSON';
	protected $primaryKey = 'ID_PRODUIT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PRODUIT' => 'int',
		'ESTALCOOLISE' => 'bool',
		'DEGREALCOOL' => 'int',
		'VOLUME' => 'int'
	];

	protected $fillable = [
		'ESTALCOOLISE',
		'DEGREALCOOL',
		'VOLUME'
	];
    //protected $with = ['stocker'];
	public function produits()
	{
		return $this->belongsTo(PRODUIT::class, 'ID_PRODUIT');
	}
}
