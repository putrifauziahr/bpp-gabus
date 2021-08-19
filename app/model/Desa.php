<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = ['kode_desa', 'desa'];
    protected $table = "desa";
    protected $primaryKey = "kode_desa";

    public function Petanis()
    {
        return $this->hasMany(Petani::class, 'kode_desa');
    }
}
