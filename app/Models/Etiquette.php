<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Etiquette extends Model
{
    use HasFactory;

    /**
     * Le nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'etiquette';

    /**
     * Le nom de la colonne de la clé primaire
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Un tableau qui contient les valeurs par défaut de certains champs
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Cette fonction renvoie une collection contenant les plats rattachés à cette étiquette
     *
     * @return Collection
     */
    public function plats()
    {
        return $this->belongsToMany(Plat::class);
    }
}