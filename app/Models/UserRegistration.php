<?php

namespace App\Models;
use App\Enums\UserRegistrationStatusEnum;
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
        'street',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    protected $casts = [
        'status' => UserRegistrationStatusEnum::class
    ];
    public function User(){
        return $this->belongsTo(User::class ,'user_id' );
    }
}

