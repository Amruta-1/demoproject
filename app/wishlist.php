<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    //
    protected $table = 'user_wish_list';

    protected $primaryKey = 'id';


    protected $fillable = ['customer_id','product_id'];
}
