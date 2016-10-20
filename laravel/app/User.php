<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'gender', 'birthdate', 'phone', 'email', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute(){
        return $this->firstname . " " . $this->lastname;
    }

    public function usermeta(){
        return $this->hasMany( Usermeta::class );
    }

    public function attendedEvents(){
        return $this->belongsToMany( Event::class );
    }

    public function attendedToEvent( $event_id ){
        return $this->attendedEvents->contains( $event_id );
    }

    public function attend( $event_id ){
        if( !$this->attendedToEvent( $event_id )){
            $this->attendedEvents()->attach( $event_id );
        }
    }

    public function unattend( $event_id ){
        if( $this->attendedToEvent( $event_id ) ){
            $this->attendedEvents()->detach( $event_id );
        }
    }
}
