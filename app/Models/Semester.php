<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semester';
    protected $primaryKey = 'id_semester';
    public $incrementing = false;

    protected $fillable = ['status'];

    public function absen()
    {
        return $this->hasMany(Absen::class, 'id_semester');
    }
}
