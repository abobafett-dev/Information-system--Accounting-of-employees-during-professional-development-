<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffTraining extends Model
{
    use HasFactory;

    protected $table = 'staff-training';

    protected $fillable = ['fk_training','fk_staff','certificate'];
}
