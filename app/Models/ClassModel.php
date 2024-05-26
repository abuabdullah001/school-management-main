<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class ClassModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='class';
    static function getrecord(){
        $return=ClassModel::select('class.*','users.name as created_by_name')
        ->join('users','users.id','class.created_by')
        ->orderBy('class.id','desc')
        ->where('class.is_delete','=',0);
        if(!empty(Request::get('name'))){
            $return= $return ->where('class.name','Like','%'.Request::get('name').'%');
        }

        if(!empty(Request::get('date'))){
            $return= $return ->whereDate('class.created_at','=',Request::get('date'));
        }
       $return=$return ->paginate(20);
        return $return;
    }

    static function getSingle($id){
        return self::find($id);
    }

    // Assign class get class
    static function getClass(){
        $return=ClassModel::select('class.*')
        ->join('users','users.id','class.created_by')
        ->orderBy('class.name','asc')
        
        ->where('class.is_delete','=',0)
        ->where('class.status','=',0)
          ->get();
        return $return;
    }

}
