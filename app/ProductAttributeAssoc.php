<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeAssoc extends Model
{
    //
    protected $table = 'product_attribute_assoc';

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
    protected $fillable = ['color','quantity','product_id'];

    
}
