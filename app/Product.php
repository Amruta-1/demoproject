<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_name','product_price','deleted_at'];

    public function category()
    {
        return $this->hasOne('App\ProductCategories','product_id');

    }
    public function product_Image()
    {
        return $this->hasOne('App\ProductImage','product_id');
    }
    public function product_Attributes()
    {
        return $this->hasOne('App\ProductAttributeAssoc','product_id');
    }

}
