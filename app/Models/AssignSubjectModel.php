<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class AssignSubjectModel extends Model
{
    use HasFactory;
   
    protected $table='class_subject';
    public $timestamps=false;
    //show and search
    static function getRecord(){
       $return=  self::select('class_subject.*','subject.name as subject_name','class.name as class_name','users.name as created_by_name')
       
        ->join('subject','subject.id','=','class_subject.subject_id')
        
        ->join('class','class.id','=','class_subject.class_id')
       
        ->join('users','users.id','=','class_subject.created_by')
        ->where('class_subject.is_delete','=',0);
          if(!empty(Request::get('class_name'))){
            $return=$return->where('class.name','like','%'.Request::get('class_name').'%');
          }
          if(!empty(Request::get('subject_name'))){
            $return=$return->where('subject.name','like','%'.Request::get('subject_name').'%');
          }

          if(!empty(Request::get('date'))){
            $return=$return->whereDate('class_subject.created_at','=',Request::get('date'));
          }
           $return=$return->orderBy('class_subject.id','desc')
        ->paginate(20);
        return $return;
    }


  //subject id and class id get
    static function getAlreadyFirst( $class_id, $subject_id){
      return self::where('class_id','=',$class_id)
      ->where('subject_id','=',$subject_id)->first();
    }
//for delete
static function getSingle($id){
  return self::find($id);
}
//for edit data get
static function getAssignSubjectId($class_id){
  return self::where('class_id','=',$class_id)
  ->where('is_delete','=',0)->get();
}

//check subject delete or not
static function deleteSubject($class_id){
  return self::where('class_id','=',$class_id)
  ->delete();
}


}
