<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['lastUpdateBy'];

    public function lastUpdateBy()
    {
        return $this->belongsTo(User::class, 'last_update_by');
    }
}
