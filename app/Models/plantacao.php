<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Plantacao extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'plantacoes';
    protected $primaryKey = 'id_plantacao';

    protected $fillable = [
        'nome',
        'lucro',
        'status',
        'custo_producao',
        'plantacoes_users',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'plantacoes_users', 'id');
}

}

