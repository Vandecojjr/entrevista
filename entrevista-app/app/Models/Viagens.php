<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Viagens extends Model //viagen com "n" por conta da tabela "viagens"
{
    use HasFactory;
    protected $fillable = [
        'id_veiculo',
        'km_i_viagem',
        'km_f_viagem',
        'id_motorista',
        'id_motorista_2',
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
    public function motorista()
    {
        return $this->belongsTo(Motorista::class, 'id_motorista');
    }
    public function motorista2()
    {
        return $this->belongsTo(Motorista::class, 'id_motorista_2');
    }
    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'id_veiculo');
    }
}
