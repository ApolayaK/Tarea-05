<?php

namespace App\Models;

use CodeIgniter\Model;

class Superhero extends Model
{
    protected $table = 'superhero SH';
    protected $allowedFields = ['id', 'superhero_name', 'full_name', 'race', 'alignment', 'publisher_name'];

    // Método para obtener por publisher
    public function getSuperHeroByPublisher(int $publisher_id)
    {
        return $this->select('SH.id, SH.superhero_name, SH.full_name, RC.race, AL.alignment')
            ->join('race RC', 'RC.id = SH.race_id', 'left')
            ->join('alignment AL', 'AL.id = SH.alignment_id', 'left')
            ->where('SH.publisher_id', $publisher_id)
            ->orderBy('SH.superhero_name', 'ASC')
            ->findAll();
    }

    /**
     * Retorna una lista de superhéroes a partir de la raza y la alineación
     */
    public function getSuperHeroByRaceAlignment(int $race_id, int $alignment_id)
    {
        return $this->select('SH.id, SH.superhero_name, SH.full_name, RC.race, PL.publisher_name')
            ->join('race RC', 'RC.id = SH.race_id', 'left')
            ->join('publisher PL', 'PL.id = SH.publisher_id', 'left')
            ->where('SH.race_id', $race_id)
            ->where('SH.alignment_id', $alignment_id)
            ->orderBy('SH.superhero_name', 'ASC')
            ->findAll();
    }
}
