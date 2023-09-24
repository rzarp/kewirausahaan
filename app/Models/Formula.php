<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Formula extends Model
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

    public function getRasioDataChart(){
        $data = DB::table('rasios as r')
        ->selectRaw('
        sum(case when (month(r.cut_off_data) = 1) then r.rasio end) as Januari,
        sum(case when (month(r.cut_off_data) = 2) then r.rasio end) as Februari,
        sum(case when (month(r.cut_off_data) = 3) then r.rasio end) as Maret,
        sum(case when (month(r.cut_off_data) = 4) then r.rasio end) as April,
        sum(case when (month(r.cut_off_data) = 5) then r.rasio end) as Mei,
        sum(case when (month(r.cut_off_data) = 6) then r.rasio end) as Juni,
        sum(case when (month(r.cut_off_data) = 7) then r.rasio end) as Juli,
        sum(case when (month(r.cut_off_data) = 8) then r.rasio end) as Agustus,
        sum(case when (month(r.cut_off_data) = 9) then r.rasio end) as September,
        sum(case when (month(r.cut_off_data) = 10) then r.rasio end) as Oktober,
        sum(case when (month(r.cut_off_data) = 11) then r.rasio end) as November,
        sum(case when (month(r.cut_off_data) = 12) then r.rasio end) as Desember
        ')
        ->join('formulas as f','f.id','=','r.id_formula')
        ->groupBy('f.nama_formula')
        ->orderBy('f.created_at','desc')
        ->where('f.id','=',$this->id)
        ->get();

        return $data;
    }
}
