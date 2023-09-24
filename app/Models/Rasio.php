<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formula;
use App\Models\Indikator;

class Rasio extends Model
{
    use HasFactory;

    public function formula_get()
    {
        return $this->hasOne(Formula::class, "id", 'id_formula')->get()[0];
    }

    public function sumber(){
        return $this->hasOne(Sumber::class, 'id', 'id_sumber')->get()[0];
    }

    public function upperName(){
        $data = json_decode($this->formula_get()->uppper);
        $a = 0;
        while ($a <= count($data)) {
            $data[$a] = [Indikator::find($data[$a])->indikator => json_decode($this->upper)[$a]];
            $a+=2;
        }

        return $data;
    }
    public function lowerName(){
        $data = json_decode($this->formula_get()->lower);
        $a = 0;
        while ($a <= count($data)) {
            $data[$a] = [Indikator::find($data[$a])->indikator => json_decode($this->lower)[$a]];
            $a+=2;
        }

        return $data;
    }
}
