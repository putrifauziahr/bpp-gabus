<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Defuzzyfikasi extends Model
{
    protected $fillable = [
        'id_fuzzy', 'harapan', 'persepsi'
    ];
    protected $table = "defuzzyfikasi";
    protected $primaryKey = "id_defuzzy";

    public function fuzzyfikasiRef()
    {
        return $this->belongsTo(Fuzzyfikasi::class, 'id_fuzzy');
    }
}
