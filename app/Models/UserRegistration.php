<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class UserRegistration extends Model
{
    use HasFactory, Notifiable;
    protected $guarded  = ['id' , 'created_at' , 'updated_at'];
    protected $fillable = [
        'valid_token',
        'token',
        'name',
        'email',
        'phone',
        'message',
        'status',
        'user_id',
    ];

    protected $casts = [
        'status' => UserRegistration::class
    ];
    public function User(){
        return $this->belongsTo(User::class ,'user_id' );
    }
}

