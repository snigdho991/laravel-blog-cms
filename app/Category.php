<?php

//Project id :  flowing-flame-231614

//AIzaSyA2wr_0yxnZNUHBwv6gAsZtZ-E8XxmDnd8

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public function posts(){
    	return $this->hasMany('App\Post');
    }

}
