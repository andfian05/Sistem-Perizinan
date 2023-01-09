<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelOuting extends Model
{
    use HasFactory;
    protected $table = 'tabel_outings';
    protected $guarded = ['id'];
}
