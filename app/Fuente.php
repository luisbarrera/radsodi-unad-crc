<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuente extends Model
{
  // public $incrementing = false;
  protected $fillable = ['id', 'estandar_id', 'detfuente', 'slug'];

  public function getRouteKeyName()
  {
    return "slug";
  }
  //Relacion Uno a Muchos
  public function planadquisiciones()
  {
    return $this->hasMany(Planadquisicione::class);
  }
  public function estandar()
  {
    return $this->belongsTo(Estandar::class);
  }
  //Relacion Uno a Muchos (Inversa)
  public function ciudad()
  {
    return $this->belongsTo(Ciudad::class, 'ciudad_id'); // Asegúrate de que el nombre de la clave foránea sea correcto
  }
}
