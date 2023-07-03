<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class Pengenalan extends Model
{

    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    protected $fillable = [
        'id',
    ];
 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function get_provinsi()
    {
        $provinsi = Province::where('id',$this->provinsi)->first();
        return $provinsi;
    }

    public function get_kabupaten()
    {
        $kabupaten = Regency::where('id',$this->kabupaten)->first();
        return $kabupaten;
    }

    public function get_kecamatan()
    {
        $kecamatan = District::where('id',$this->kecamatan)->first();
        return $kecamatan;
    }

    public function get_kelurahan()
    {
        $kelurahan = Village::where('id',$this->kelurahan)->first();
        return $kelurahan;
    }

    
}
