<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    //
     protected $table = 'order_details';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cart','shipping_address_id','billing_address_id','cart_total','shipping_charge','grand_total','transaction_id','customer_id'];
}
