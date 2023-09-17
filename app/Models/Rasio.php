<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formula;

class Rasio extends Model
{
    use HasFactory;

    public function formula_get()
    {
        return $this->hasOne(Formula::class, "id", 'id_formula')->get();
    }
}
