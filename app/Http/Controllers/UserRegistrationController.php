<?php

namespace App\Http\Controllers;
use App\Enums\UserRegistrationStatusEnum;
use App\Models\UserRegistration;
use App\Notifications\EmailUserRegistration;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;
use App\Events\EmailSent;
class UserRegistrationController extends ApiController
{
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $userRegistration = new UserRegistration();
            $userRegistration->email = $request->email;
            $userRegistration->status = UserRegistrationStatusEnum::START;
            $userRegistration->save();

            DB::afterCommit(function () use ($request, $userRegistration)  {
                //event(new EmailSent($request->email));
                $this->notify(new EmailUserRegistration($userRegistration));
                $userRegistration->update(['status' => UserRegistrationStatusEnum::EMAIL_SENT]);
            });

            return $this->successResponse($userRegistration);
        });
    }

    public function update(Request $request, UserRegistration $userRegistration )
    {
        return DB::transaction(function () use ($request, $userRegistration) {
            $userRegistration->status = UserRegistrationStatusEnum::WAITING_APPROVAL;
            $userRegistration->name = $request->name;
            $userRegistration->email = $request->email;
            $userRegistration->phone = $request->phone;
            $userRegistration->message = $request->message;
            $userRegistration->save();
            return $this->successResponse($userRegistration);
        });
    }
}
