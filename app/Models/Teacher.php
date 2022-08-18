<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name', 'last_name', 'university_degree', 'age', 'contract_date', 'imagen', 'identify_document'];
    use HasFactory;
}
