<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'training';

    protected $fillable = ['fk_type','fk_qualification','fk_training_organization','date_start','date_expiration','price_per_hour','duration_in_hours'];
}
