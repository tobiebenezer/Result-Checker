<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\entity;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'address',
        'entity',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

      /**
     * USER ATTRIBUTES
     * this->attribute['id']-int-contain the user primary key(id)
     * $this->attributes['name']-string-contains the user name
     * $this->attributes['email']-string-contains the user email
     * $this->attributes['dob']-'timestamp - contain the date of birth for the user
     * $this->attributes['email_verified_at']-string-contain the user email verification date
     * $this->attributes['password']-string-contains the user password
     * $this->attributes['remember_token']-string-contain user password 
     * $this->attributes['crated_at']-timestamp- contains the user creation date
     * $this->attributes['update_at']-timestamp- contains the user update date
     * $this->entity-entity[]=contains the associated entity
     */


    public function getId(){
        return $this->attributes['id'];
    }

public function setId($id)
{
        $this->attributes['id']=$id;
    }

public function getName()
{
        return $this->attributes['name'];
    }

public function setName($name)
    {
        $this->attributes['name']=$name;
    }
public function getEmail()
{
return $this->attributes['email'];
} 
public function setEmail($email)
{
$this->attributes['email'] = $email;
} 
public function getPassword()
{
return $this->attributes['password'];
} 
public function setPassword($password)
{
$this->attributes['password'] = $password;
} 
public function getDob(){
    $this->attributes['dob'];
}
public function setDob($dob){
    $this->attributes['dob'] = $dob;
}

public function getCreatedAt()
{
return $this->attributes['created_at'];
} 
public function setCreatedAt($createdAt)
{
$this->attributes['created_at'] = $createdAt;
} 
public function getUpdatedAt()
{
return $this->attributes['updated_at'];
} 
public function setUpdatedAt($updatedAt)
{
$this->attributes['updated_at'] = $updatedAt;
}public function entity(){
    return $this->hasMany(entity::class);
}

public function getEntity(){
    return $this->entity;
}



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
}
