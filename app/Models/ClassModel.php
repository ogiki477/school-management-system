<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    static public function findSingle($id){
        return self::find($id);
    }

    static public function getSingleClass(){
        $data = self::select('class.*','users.name as created_by_name' )
                ->join('users','users.id','class.created_by');
                if(!empty(Request::get('name'))){

                    $data = $data->where('class.name','like','%'.Request::get('name').'%');

                }

                if(!empty(Request::get('date'))){
                    $data = $data->whereDate('class.created_at','=',Request::get('date'));

                }

        $data = $data->orderBy('class.id','desc')
                     ->paginate(2);
        return $data;
    }


    static public function getClass(){

        $data = self::select('class.*')
                ->join('users','users.id','class.created_by')
                ->where('class.status','=',0)
                ->orderBy('class.name','asc')
                ->get();
        return $data;

    }

}
