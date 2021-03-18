<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProject extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_project';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'project_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id','id');
    }
}
