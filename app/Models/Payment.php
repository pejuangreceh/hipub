<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = ['id_user', 'id_artikel', 'file_bukti', 'nominal', 'verified'];
    // protected $guarded = [];
}
