<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class SubjectModel extends Model
{
    use HasFactory;
    protected $table='subject';



    static function getrecord(){
        $return=SubjectModel::select('subject.*','users.name as created_by_name')
        ->join('users','users.id','subject.created_by')
        ->orderBy('subject.id','desc')
        ->where('subject.is_delete','=',0);
        if(!empty(Request::get('name'))){
           $return=$return->where('subject.name','like','%'.Request::get('name').'%');
        }
      if(!empty(Request::get('date'))){
        $return=$return->whereDate('subject.created_at','=',Request::get('date'));
      }

      if(!empty(Request::get('type'))){
        $return=$return->where('subject.type','like','%'.Request::get('type').'%');
      }
       $return=$return ->paginate(20);
        return $return;
    }

//find id
    static function getSingle($id){
        return self::find($id);
    }



    static function getSubject(){
      $return=SubjectModel::select('subject.*')
      ->join('users','users.id','subject.created_by')
      ->orderBy('subject.name','asc')
      ->where('subject.is_delete','=',0)
      ->where('subject.status','=',0)
      ->get();
      return  $return;
    }
}