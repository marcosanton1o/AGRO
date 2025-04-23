<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plantacao extends Model
{
    use HasFactory;

    protected $table = 'platacoes';
    protected $primaryKey = 'id_platacoes';

    protected $fillable = [
        'nome',
        'plantacoes_users',
        'lucro',
        'status',
        'custo_producao',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'plantacoes_users', 'id');
    }
}
