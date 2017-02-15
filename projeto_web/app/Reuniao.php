<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $table = 'reunioes';
    protected $fillable = ['nome', 'user_id', 'local', 'data', 'hora'];

    public function participantes(){
    	return $this->belongsToMany('App\User');
    }
}
