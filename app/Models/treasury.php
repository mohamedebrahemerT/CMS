<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class treasury extends Model
{
    use HasFactory;

     protected $table = 'treasuries';

    public $fillable = ['sub', 'main','diff'];

}
