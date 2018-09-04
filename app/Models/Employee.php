<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 9/1/2018
 * Time: 4:27 PM
 */

namespace App\Models;


class Employee extends BaseModel
{
    protected $table = 'employees';

    protected $primaryKey = 'id';
    protected $fillable =  [
        'id','first_name','last_name','email','phone','company_id','created_at','updated_at'
    ];

    public function get_companies(){
        return $this->belongsTo(Company::class,'company_id');
    }



}