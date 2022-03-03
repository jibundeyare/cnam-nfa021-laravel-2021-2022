<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Le nom de la table correspondante
     *
     * @var string
     */
    protected $table = 'reservation';

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
}
