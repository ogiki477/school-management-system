<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;

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
        'password',
    ];

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

    static public function getEmailSingle($email){
        return User::where('email','=',$email)->first();
    }

    static public function getTokenSingle($remember_token){
        return User::where('remember_token','=',$remember_token)->first();
    }

    static public function getAdmin(){

        $data =  self::select('users.*')
                    ->where('is_role','=',1);
                    if(!empty(Request::get('name'))){
                        $data = $data->where('name','like','%'.Request::get('name').'%');

                    }
                    if(!empty(Request::get('email'))){
                        $data = $data->where('email','like','%'.Request::get('email').'%');

                    }

                    if(!empty(Request::get('date'))){
                        $data = $data->whereDate('created_at','=',Request::get('date'));

                    }

        $data = $data->orderBy('id','desc')
                     ->paginate(2);

        return $data;


    }
}
