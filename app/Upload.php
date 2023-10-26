<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads'; // Nome da tabela no banco de dados
    protected $fillable = ['user_id', 'file_name', 'approved']; // Colunas que podem ser preenchidas em massa

    // Defina o relacionamento com a tabela 'users'
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}