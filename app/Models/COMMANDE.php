<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class COMMANDE
 *
 * @property int $IDCOMMANDE
 * @property Carbon|null $HEURECOMMANDE
 *
 * @property Collection|AEMPORTER[] $a_e_m_p_o_r_t_e_r_s
 * @property AEMPORTER $a_e_m_p_o_r_t_e_r
 * @property Collection|COMPOSER[] $c_o_m_p_o_s_e_r_s
 * @property Collection|RECOI[] $r_e_c_o_i_s
 * @property SURPLACE $s_u_r_p_l_a_c_e
 *
 * @package App\Models
 */
class COMMANDE extends Model
{
	protected $table = 'COMMANDE';
	protected $primaryKey = 'IDCOMMANDE';
	public $timestamps = false;

	protected $dates = [
		'HEURECOMMANDE'
	];

	protected $fillable = [
		'HEURECOMMANDE'
	];
    protected $with = ['composer'];

	public function aemporter()
	{
		return $this->hasMany(AEMPORTER::class, 'IDCOMMANDE');
	}

	public function a_e_m_p_o_r_t_e_r()
	{
		return $this->hasOne(AEMPORTER::class, 'IDCOMMANDE_HER_1');
	}

	public function composer()
	{
		return $this->hasMany(COMPOSER::class, 'IDCOMMANDE');
	}

	public function recois()
	{
		return $this->hasMany(RECOI::class, 'IDCOMMANDE');
	}

	public function surplace()
	{
		return $this->hasOne(SURPLACE::class, 'IDCOMMANDE');
	}
}
