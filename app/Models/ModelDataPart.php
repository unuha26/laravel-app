<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDataPart extends Model
{
    use HasFactory;
    protected $table = 'data_part';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
