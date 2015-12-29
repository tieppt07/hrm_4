<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public static function boot()
    {
        parent::boot();
        Position::deleting(function ($position) {
            $position->users()->update(['position_id' => null]);
        });
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
