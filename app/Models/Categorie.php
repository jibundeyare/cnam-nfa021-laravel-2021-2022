<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    /**
     * Le nom de la table
     *
     * @var string
     */
    protected $table = 'categorie';

    /**
     * Le nom de la colonne de la clé primaire
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Tableau qui contient les valeurs par défaut de certains champs
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Cette fonction renvoie une collection contenant les plats rattachés à cette catégorie
     *
     * @return Collection
     */
    public function plats()
    {
        // 'categorie_id' correspond à la colonne de la clé étrangère dans la table 'plat'
        // 'id' correspond à la colonne de la clé primaire dans la table 'categorie'
        return $this->hasMany(Plat::class, 'categorie_id', 'id');
    }
}
