<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];
    const CATEGORIES = ['Action', 'Drama', 'Comedy', 'Romance', 'Horror'];
    use HasFactory;
}
