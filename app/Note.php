<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['body', 'customer_id','user_id','user_name', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
