<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'code',
        'contact_person',
        'tel',
        'phone',
        'fax',
        'email',
        'address',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
