<?php

namespace App\Actions\Fortify;

use App\Models\entity;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob'=> ['required','date'],
            
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        //create entity or roles with matric number
        $entity= new entity();
        $entity->setRole($input['role']);
        $entity['matric_no']= $input['role'] == 'student'? $input['matric_no'] : NULL;
        $entity->save();
    
        // obtaning the index or the last created entity
        $roleId=entity::select('id')->orderBy('id','DESC')->first();
        
        // create user
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'dob' => $input['dob'],
            'address' => $input['address'],
            'entity'=> $roleId->id,
            'password' => Hash::make($input['password']),
            
        ]);
    }
}
