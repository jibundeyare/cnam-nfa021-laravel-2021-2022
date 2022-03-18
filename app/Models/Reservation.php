<?php

namespace App\Models;

use DateTime;
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
    protected $attributes = [
        'nom' => '',
        'tel' => '',
        'jour' => '',
        'heure' => '',
        'couverts' => 2,
        'commentaires' => '',
        'confirmation' => null,
    ];

    /**
     * Un tableau qui contient le nom des colonnes changeable avec les fonctions fill() et create()
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'tel',
        'jour',
        'heure',
        'couverts',
        'commentaires',
        'confirmation',
    ];

    public function __construct()
    {
        $now = new DateTime();
        $this->attributes['jour'] = $now->format('Y-m-d');
        $this->attributes['heure'] = $now->format('H:i');
    }

    public function modelToForm(): array
    {
        // conversion de l'objet en tableau mais sans les relations
        $data = $this->attributesToArray();

        if ($data['confirmation'] === 0) {
            // annulé
            $data['confirmation'] = '0';
        } elseif ($data['confirmation'] === 1) {
            // confirmé
            $data['confirmation'] = '1';
        } else {
            // en attente
            $data['confirmation'] = 'null';
        }

        return $data;
    }

    public function formToModel(array $data)
    {
        if (empty($data['commentaires'])) {
            $data['commentaires'] = '';
        }

        if ($data['confirmation'] == '0') {
            // annulé
            $data['confirmation'] = 0;
        } elseif ($data['confirmation'] == '1') {
            // confirmé
            $data['confirmation'] = 1;
        } else {
            // en attente
            $data['confirmation'] = null;
        }

        $this->fill($data);
    }
}
