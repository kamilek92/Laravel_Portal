<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    protected $fillable = [
        'content', 'user_id'
    ];
    use SoftDeletes; //FORCEDELETE USYWANIE NA ZAWSZe  DAJE NAM TO ABY DŁUGO BYŁ
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User'); //TEN POST NALEŻY DO DANEGO UŻTKOWNIKA
    }

}
