<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashin extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'username', 'siteid', 'amount', 'receiver', 'reciboimage', 'ref_no', 'ispending', 'approved_date', 'remarks'];
}
