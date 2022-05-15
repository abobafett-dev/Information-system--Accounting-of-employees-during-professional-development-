<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingOrganization extends Model
{
    use HasFactory;

    protected $table = 'training_organization';

    protected $fillable = ['inn','name'];
}
