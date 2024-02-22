<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class BARMAN
 *
 * @property int $ID_USER
 * @property int $ID_BAR
 * @property bool|null $ESTDIRIGEANT
 * @property Carbon|null $DATE_ARRIVER
 * @property Carbon|null $DATE_DEPART
 * @property bool|null $ESTBARMAN
 * @property string|null $NOM
 * @property string|null $PRENOM
 * @property string|null $MAIL
 * @property string|null $MDP
 *
 * @property BAR $b_a_r
 * @property Collection|SURPLACE[] $s_u_r_p_l_a_c_e_s
 *
 * @package App\Models
 */
class BARMAN extends Model
{

    use HasApiTokens, HasFactory, Notifiable;
	protected $table = 'BARMAN';
	protected $primaryKey = 'ID_USER';
	public $timestamps = false;

	protected $casts = [
		'ID_BAR' => 'int',
		'ESTDIRIGEANT' => 'bool',
		'ESTBARMAN' => 'bool'
	];

	protected $dates = [
		'DATE_ARRIVER',
		'DATE_DEPART'
	];

	protected $fillable = [
		'ID_BAR',
		'ESTDIRIGEANT',
		'DATE_ARRIVER',
		'DATE_DEPART',
		'ESTBARMAN',
		'NOM',
		'PRENOM',
		'MAIL',
		'MDP'
	];

	public function b_a_r()
	{
		return $this->belongsTo(BAR::class, 'ID_BAR');
	}

	public function s_u_r_p_l_a_c_e_s()
	{
		return $this->hasMany(SURPLACE::class, 'ID_USER');
	}
}
