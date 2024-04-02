<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id','nome'];

    public function contatos()
    {
        return $this->hasMany(Contato::class);
    }
}