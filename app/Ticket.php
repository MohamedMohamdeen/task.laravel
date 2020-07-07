<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable=[
    	'name','user_id','end_date'
    ];
    public function user()
    {
    	return $this->belongsTo('App\User')->withDefault();
    }
}
 