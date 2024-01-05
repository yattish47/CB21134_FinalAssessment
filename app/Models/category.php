<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['categoryName', 'categoryType', 'categoryAmount'];
}
