<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    public static function getSingleSubject(){
        $data = self::select('subject.*','users.name as created_by_name' )
                ->join('users','users.id','subject.created_by');
                if(!empty(Request::get('name'))){

                    $data = $data->where('subject.name','like','%'.Request::get('name').'%');

                }

                if(!empty(Request::get('date'))){
                    $data = $data->whereDate('subject.created_at','=',Request::get('date'));

                }

        $data = $data->orderBy('subject.id','desc')
                     ->paginate(2);
        return $data;
    }
}
