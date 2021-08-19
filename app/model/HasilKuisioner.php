<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class HasilKuisioner extends Model
{
    protected $fillable = [
        'id_petani', 'id_penyuluhan', 'id_kuis', 'jawabanper[]', 'jawabanhar[]'
    ];
    protected $table = "hasil_kuisioners";
    protected $primaryKey = "id_hasil";

    public function Penyuluhans()
    {
        return $this->belongsTo(Penyuluhan::class, 'id_penyuluhan');
    }

    public function Petanis()
    {
        return $this->belongsTo(Petani::class, 'id_petani');
    }

    public function Kuisioners()
    {
        return $this->belongsTo('App\Model\Kuisioner', 'id_kuis');
    }

    public function fuzzyRef()
    {
        return $this->hasMany('App\Model\Fuzzyfikasi', 'id_hasil');
    }
}
