<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'invoice_no',
        'description',
        'discount',
        'tax',
        'tax_value',
        'total_hour',
        'rate_hour',
        'grand_total',
        'remark',
        'paid',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project','project_id','id');
    }
}
