<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'customer_id',
        'description',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id','id');
    }

    public function workloads()
    {
        return $this->hasMany('App\Models\ProjectWorkload','project_id','id');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\EmployeeProject', 'project_id', 'id');
    }
}
