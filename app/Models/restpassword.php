<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restpassword extends Model
{
    use HasFactory;
    protected $table = 'password_resets';
}
