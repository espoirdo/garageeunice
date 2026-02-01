<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reparation;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'couleur',
        'carrosserie',
        'energie',
        'kilometrage',
        'annee',
        'image',
        'immatriculation'
    ];

    /**
     * Relation : un véhicule peut avoir plusieurs réparations
     */
    public function reparation()
    {
        return $this->hasMany(Reparation::class);
    }

    /**
     * Accesseur pour obtenir l’URL complète de l’image
     */
  public function getImageUrlAttribute(): string
{
    // Vérifie si le fichier existe dans public/images
    if ($this->image && file_exists(public_path('images/' . $this->image))) {
        return asset('images/' . $this->image);
    }

    // Sinon, vérifie dans storage/images
    if ($this->image && file_exists(storage_path('app/public/images/' . $this->image))) {
        return asset('storage/images/' . $this->image);
    }

    // Image par défaut
    return asset('images/default-car.jpg');
}
}