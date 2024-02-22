<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PRODUIT
 *
 * @property int $ID_PRODUIT
 * @property string|null $NOM_PRODUIT
 *
 * @property BOISSON $b_o_i_s_s_o_n
 * @property Collection|CATEGORISER[] $c_a_t_e_g_o_r_i_s_e_r_s
 * @property Collection|COMPOSER[] $c_o_m_p_o_s_e_r_s
 * @property NOURRITURE $n_o_u_r_r_i_t_u_r_e
 * @property Collection|STOCKER[] $s_t_o_c_k_e_r_s
 *
 * @package App\Models
 */
class PRODUIT extends Model
{
    use HasFactory;
	protected $table = 'PRODUIT';
	protected $primaryKey = 'ID_PRODUIT';
	public $timestamps = false;

	protected $fillable = [
		'NOM_PRODUIT'
	];
    protected $with = ['nourriture','boisson','stocker'];
	public function boisson()
	{
		return $this->hasOne(BOISSON::class, 'ID_PRODUIT');
	}

	public function categorie()
	{
		return $this->hasMany(CATEGORISER::class, 'ID_PRODUIT');
	}

	public function composer()
	{
		return $this->hasMany(COMPOSER::class, 'ID_PRODUIT');
	}

	public function nourriture()
	{
		return $this->hasOne(NOURRITURE::class, 'ID_PRODUIT');
	}

	public function stocker()
	{
		return $this->hasMany(STOCKER::class, 'ID_PRODUIT');
	}
}
