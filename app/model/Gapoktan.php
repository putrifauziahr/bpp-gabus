<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Gapoktan extends Model
{
    protected $fillable = ['gapoktan'];
    protected $table = "gapoktan";
    protected $primaryKey = "id_gapoktan";

    public function poktanRef()
    {
        return $this->hasMany(KelompokTani::class, 'id_gapoktan');
    }
}
