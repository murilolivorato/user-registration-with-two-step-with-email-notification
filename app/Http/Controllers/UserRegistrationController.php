<?php

namespace App\Http\Controllers;
use App\Enums\UserRegistrationStatusEnum;
use App\Http\Request\StoreUserRegistrationRequest;
use App\Http\Request\UpdateUserRegistrationRequest;
use App\Models\UserRegistration;
use App\Notifications\EmailUserRegistration;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;
use App\Events\EmailSent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
class UserRegistrationController extends ApiController
{
    public function store(StoreUserRegistrationRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $userRegistration = new UserRegistration();
            $userRegistration->email = $request->email;
            $userRegistration->name = $request->name;
            $userRegistration->token = base64_encode(Hash::make(Carbon::now()->format('YmdHs')));
            $userRegistration->valid_token = Carbon::now()->addDays(5);
            $userRegistration->status = UserRegistrationStatusEnum::START;
            $userRegistration->save();

            DB::afterCommit(function () use ($request, $userRegistration)  {
                $userRegistration->notify(new EmailUserRegistration($userRegistration));
                $userRegistration->update(['status' => UserRegistrationStatusEnum::EMAIL_SENT]);
            });

            return $this->successResponse($userRegistration);
        });
    }

    public function update(UpdateUserRegistrationRequest $request )
    {
        $userRegistration = $request['userRegistration'];
        return DB::transaction(function () use ($request, $userRegistration) {
            $userRegistration->status = UserRegistrationStatusEnum::WAITING_APPROVAL;
            $userRegistration->token = null;
            $userRegistration->phone = $request->phone;
            $userRegistration->message = $request->message;
            $userRegistration->street = $request->street;
            $userRegistration->city = $request->city;
            $userRegistration->state = $request->state;
            $userRegistration->postal_code = $request->postal_code;
            $userRegistration->country = $request->country;
            $userRegistration->save();
            return $this->successResponse($userRegistration);
        });
    }
}
