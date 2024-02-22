<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class CLIENT
 *
 * @property int $ID_USER
 * @property string|null $DATEINSCRIPTION
 * @property string|null $NOM
 * @property string|null $PRENOM
 * @property string|null $MAIL
 * @property string|null $MDP
 *
 * @property Collection|AEMPORTER[] $a_e_m_p_o_r_t_e_r_s
 *
 * @package App\Models
 */
class CLIENT extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
	protected $table = 'CLIENTS';
	protected $primaryKey = 'ID_USER';
	public $timestamps = false;

    protected $fillable = [
        'create_at',
        'NOM',
        'PRENOM',
        'MAIL',
        'MDP'
    ];

	public function a_e_m_p_o_r_t_e_r_s()
	{
		return $this->hasMany(AEMPORTER::class, 'ID_USER');
	}
}
