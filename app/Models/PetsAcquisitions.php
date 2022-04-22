<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetsAcquisitions extends Model
{
    use HasFactory;

    protected $table = "pets_acquisitions";
    protected $guarded = [];
}
