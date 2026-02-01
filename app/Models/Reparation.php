<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    protected $fillable = ['vehicule_id', 'technicien_id', 'date', 'duree_main_oeuvre', 'objet_reparation'];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function technicien()
    {
        return $this->belongsTo(Technicien::class);
    }
}