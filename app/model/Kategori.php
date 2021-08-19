<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['kategori'];
    protected $table = "kategoris";
    protected $primaryKey = "id_kategori";

    public function Kuisioners()
    {
        return $this->hasMany(Kuisioner::class, 'id_kategori');
    }
}
