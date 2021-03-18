<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePresence extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_presence';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'check_in',
        'check_out',
        'remark',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
