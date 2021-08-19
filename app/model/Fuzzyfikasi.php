<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fuzzyfikasi extends Model
{
    protected $fillable = [
        'id_hasil', 'batasBawahHarapan', 'batasTengahHarapan', 'batasAtasHarapan',
        'batasBawahPersepsi', 'batasTengahPersepsi', 'batasAtasPersepsi'
    ];
    protected $table = "fuzzyfikasi";
    protected $primaryKey = "id_fuzzy";

    public function hasilRef()
    {
        return $this->belongsTo(HasilKuisioner::class, 'id_hasil');
    }

    public function defuzzyRef()
    {
        return $this->hasMany(Defuzzyfikasi::class, 'id_fuzzy');
    }
}
