<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Veiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelo',
        'ano',
        'data_aquisicao',
        'kms_rodados',
        'renavam'
    ];

    protected $casts = [
        'data_aquisicao' => 'date',
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
}
