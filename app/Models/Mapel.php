<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';

    protected $fillable = ['mapel'];

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
}
