<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectWorkload extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_workload';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'project_id',
        'start_time',
        'end_time',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project','project_id','id');
    }
}
