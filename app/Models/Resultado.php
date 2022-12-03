<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $table = 'resultados';
    protected $fillable = [
        'total',
        'evaluacionId',
        'areaId'
    ];

    public function evaluacion() {
        return $this->belongsTo(Evaluacion::class, 'evaluacionId');
    }

    public function area() {
        return $this->belongsTo(Area::class, 'areaId');
    }
}
