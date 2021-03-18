<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePaidSalary extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_paid_salary';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'working_hour',
        'base_salary',
        'nett_salary',
        'paid_at',
        'issued_by',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
