<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'idgroupe' , 'date_naissance', 'linkedin',
        'entreprise', 'niveau', 'email', 'password', 'admin' , 'numero' ,
        'numero' , 'photo' , 'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addNew($input)

    {

        $check = static::where('google_id',$input['google_id'])->first();


        if(is_null($check)){

            return static::create($input);

        }


        return $check;

    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
