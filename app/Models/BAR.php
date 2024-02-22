<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BAR
 *
 * @property int $ID_BAR
 * @property int $ID_TYPE
 * @property string|null $NOMBAR
 * @property string|null $PHOTOBAR
 * @property Carbon|null $OUVERTURE
 * @property Carbon|null $FERMETURE
 * @property string|null $ADRESSE
 *
 * @property TYPEBAR $TYPEBAR
 * @property Collection|BARMAN[] $b_a_r_m_e_n
 * @property Collection|RECOI[] $r_e_c_o_i_s
 * @property Collection|STOCKER[] $s_t_o_c_k_e_r_s
 *
 * @package App\Models
 */
class BAR extends Model
{
    use HasFactory;
	protected $table = 'BARS';
	protected $primaryKey = 'ID_BAR';
	public $timestamps = false;

    //protected $with = ['typebar'];
	protected $casts = [
		'ID_TYPE' => 'int'
	];

	protected $dates = [
		'OUVERTURE',
		'FERMETURE'
	];

	protected $fillable = [
		'ID_TYPE',
		'NOMBAR',
		'PHOTOBAR',
		'OUVERTURE',
		'FERMETURE',
		'ADRESSE'
	];

	public function typebar()
	{
		return $this->belongsTo(TYPEBAR::class, 'ID_TYPE');
	}

	public function barmen()
	{
		return $this->hasMany(BARMAN::class, 'ID_BAR');
	}

	public function r_e_c_o_i_s()
	{
		return $this->hasMany(RECOI::class, 'ID_BAR');
	}

	public function stocker()
	{
		return $this->hasMany(STOCKER::class, 'ID_BAR');
	}
}
