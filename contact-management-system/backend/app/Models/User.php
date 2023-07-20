<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id'
    ];

    /**
     * Return Contact relationship.
     * 
     * @return App\Models\Contact
     */
    public function contact()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Return Login relationship.
     * 
     * @return App\Models\Login
     */
    public function login()
    {
        return $this->hasOne(Login::class);
    }
}
