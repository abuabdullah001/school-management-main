<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    // get record show admin function
    static function getAdmin(){
     $return= self::select('users.*')
        ->where('role','=',1)
        ->where('is_delete','=',0);
        if(!empty(Request::get('name'))){
            $return=$return->where('name','Like','%'.Request::get('name').'%');
        }


        if(!empty(Request::get('email'))){
            $return=$return->where('email','Like','%'.Request::get('email').'%');
        }



        if(!empty(Request::get('class'))){
            $return=$return->where('class','Like','%'.Request::get('class').'%');
        }


        if(!empty(Request::get('date'))){
            $return=$return->whereDate('created_at','=',Request::get('date'));
        }
        $return=$return->orderBy('id','desc')
        ->paginate(20);

      return $return;
    }



    // get record show student data
    static function getStudent(){
        $return= self::select('users.*','class.name as class_name','parent.name as parent_name','parent.last_name as parent_lastName')
        ->join('users as parent','parent.id','=','users.parent_id','left')
           ->join('class','class.id','=','users.class_id','left')
           ->where('users.is_delete','=',0)
           ->where('users.role','=',3);

           if(!empty(Request::get('name'))){
            $return=$return->where('users.name','Like','%'.Request::get('name').'%');
        }

        if(!empty(Request::get('last_name'))){
            $return=$return->where('users.last_name','Like','%'.Request::get('last_name').'%');
        }

        if(!empty(Request::get('email'))){
            $return=$return->where('users.email','Like','%'.Request::get('email').'%');
        }



        if(!empty(Request::get('addmission_number'))){
            $return=$return->where('users.addmission_number','Like','%'.Request::get('addmission_number').'%');
        }

        if(!empty(Request::get('roll_number'))){
            $return=$return->where('users.roll_number','Like','%'.Request::get('roll_number').'%');
        }

        if(!empty(Request::get('class'))){
            $return=$return->where('class.name','Like','%'.Request::get('class').'%');
        }
        if(!empty(Request::get('gender'))){
            $return=$return->where('users.gender','Like','%'.Request::get('gender').'%');
        }

        if(!empty(Request::get('mobile_number'))){
            $return=$return->where('users.mobile_number','Like','%'.Request::get('mobile_number').'%');
        }

        if(!empty(Request::get('date'))){
            $return=$return->whereDate('users.created_at','=',Request::get('date'));
        }



           $return=$return->orderBy('users.id','desc')
           ->paginate(20);

         return $return;
       }

       //start get data for teacher list

       static function getTeacher(){
        $return=self::select('users.*')
        ->where('users.is_delete','=',0)
        ->where('users.role','=',2);

        if(!empty(Request::get('name'))){
            $return=$return->where('users.name','Like','%'.Request::get('name').'%');
        }

        if(!empty(Request::get('last_name'))){
            $return=$return->where('users.last_name','Like','%'.Request::get('last_name').'%');
        }

        if(!empty(Request::get('email'))){
            $return=$return->where('users.email','Like','%'.Request::get('email').'%');
        }



        if(!empty(Request::get('qualification'))){
            $return=$return->where('users.qualification','Like','%'.Request::get('qualification').'%');
        }

        if(!empty(Request::get('marital_status'))){
            $return=$return->where('users.marital_status','Like','%'.Request::get('marital_status').'%');
        }


        if(!empty(Request::get('gender'))){
            $return=$return->where('users.gender','Like','%'.Request::get('gender').'%');
        }

        if(!empty(Request::get('mobile_number'))){
            $return=$return->where('users.mobile_number','Like','%'.Request::get('mobile_number').'%');
        }
        if(!empty(Request::get('date_of_joining'))){
            $return=$return->whereDate('users.date_of_joining','=',Request::get('date_of_joining'));
        }
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('users.created_at','=',Request::get('date'));
        }
        $return=$return->orderBy('users.id','desc')
        ->paginate(20);
        return $return;
       }

       //get data to show Parent list
       static function getParent(){

        $return=self::select('users.*')
        ->where('users.is_delete','=',0)
        ->where('users.role','=',4);

        if(!empty(Request::get('name'))){
            $return=$return->where('users.name','Like','%'.Request::get('name').'%');
        }

        if(!empty(Request::get('last_name'))){
            $return=$return->where('users.last_name','Like','%'.Request::get('last_name').'%');
        }

        if(!empty(Request::get('email'))){
            $return=$return->where('users.email','Like','%'.Request::get('email').'%');
        }






        if(!empty(Request::get('gender'))){
            $return=$return->where('users.gender','Like','%'.Request::get('gender').'%');
        }

        if(!empty(Request::get('mobile_number'))){
            $return=$return->where('users.mobile_number','Like','%'.Request::get('mobile_number').'%');
        }


        if(!empty(Request::get('address'))){
            $return=$return->where('users.address','Like','%'.Request::get('address').'%');
        }

        if(!empty(Request::get('occupation'))){
            $return=$return->where('users.occupation','Like','%'.Request::get('occupation').'%');
        }

        if(!empty(Request::get('date'))){
            $return=$return->whereDate('users.created_at','=',Request::get('date'));
        }

       $return=$return ->orderBy('users.id','desc')
        ->paginate(20);
        return $return;
       }

    //edit admin
     static function getSingle($id){
      return self::find($id);
     }


     //get search student
     static function getSearchStudent(){
         if( !empty(Request::get('id')) || !empty(Request::get('name')) || !empty(Request::get('last_name'))
         || !empty(Request::get('email')))
        {
            $return= self::select('users.*','class.name as class_name','parent.name as parent_name')
            ->join('users as parent','parent.id','=','users.parent_id','left')
            ->join('class','class.id','=','users.class_id','left')
            ->where('users.is_delete','=',0)
            ->where('users.role','=',3);

            if(!empty(Request::get('id'))){
                $return=$return->where('users.id','=',Request::get('id'));
            }

            if(!empty(Request::get('name'))){
             $return=$return->where('users.name','Like','%'.Request::get('name').'%');
         }

         if(!empty(Request::get('last_name'))){
             $return=$return->where('users.last_name','Like','%'.Request::get('last_name').'%');
         }

         if(!empty(Request::get('email'))){
             $return=$return->where('users.email','Like','%'.Request::get('email').'%');
         }


            $return=$return->orderBy('users.id','desc')
            ->limit(50)
            ->get();

          return $return;

        }

    }

    //get student for parent

    static function getMyStudent($parent_id){

           $return= self::select('users.*','class.name as class_name','parent.name as parent_name')
           ->join('users as parent','parent.id','=','users.parent_id','left')
           ->join('class','class.id','=','users.class_id','left')
           ->where('users.is_delete','=',0)
           ->where('users.role','=',3)
           ->where('users.parent_id','=',$parent_id)
           ->orderBy('users.id','desc')
           ->limit(50)
           ->get();

         return $return;

    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
