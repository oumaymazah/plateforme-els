<?php

namespace App\Models;

use App\Models\Formation;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'date_debut',
        'date_fin',
        'formation_id',
        
    ];

    // // Relation avec Professeur


    // Relation avec Formation
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
   /**
     * Relation One-to-Many : Un cours a plusieurs devoirs.
     */
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
