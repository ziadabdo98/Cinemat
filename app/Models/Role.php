<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN_CODE = 1;
    const MANAGER_CODE = 2;
    const CUSTOMER_CODE = 3;
}
