<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercises';
    protected $fillable = ['name', 'description', 'image', 'type'];
    public $timestamps = false;

    public function routines(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Routine::class, 'routine_exercises', 'exercise_id', 'routine_id');
    }

    public function routinesExercises(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RoutineExercise::class);
    }

}
