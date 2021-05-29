<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['kelas'];

    public function siswa()
    {
        return $this->hasMany(Kelas::class, 'id_kelas');
    }
}
