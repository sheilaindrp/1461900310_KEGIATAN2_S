<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absen';
    protected $primaryKey = 'id_absen';

    protected $fillable = ['nis', 'id_semester', 'tanggal', 'absen'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester');
    }
}
