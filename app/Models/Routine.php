<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $table = 'routines';
    protected $fillable = ['name', 'description', 'user_id'];
    public $timestamps = false;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exercises(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Exercise::class, 'routine_exercise', 'routine_id', 'exercise_id');
    }

    public function getExercises()
    {
        return $this->exercises()->get();
    }

    public function addExercisesToRoutine($exercises)
    {
        $this->exercises()->attach($exercises);
    }

}
