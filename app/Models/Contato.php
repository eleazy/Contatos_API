<?php
// app/Models/Contato.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id','nome', 'sobrenome', 'data_nascimento', 'telefone', 'celular', 'email', 'empresa_id'];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
}

