<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public static function boot()
    {
        parent::boot();
        Department::deleting(function ($department) {
            $department->users()->update(['department_id' => null]);
        });
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
