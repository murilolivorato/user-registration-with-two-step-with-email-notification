<?php

namespace App\Http\Middleware;

use App\Enums\UserRegistrationStatusEnum;
use App\Models\UserRegistration;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateTokenUserRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    use ApiResponse;

    public function handle(Request $request, Closure $next): Response
    {
        $userRegistration = UserRegistration::where('token', $request->token)->first();
        if(!$userRegistration) {
            return $this->errorResponse('it has an error, invalid token', 401);
        }
        if($userRegistration->status != UserRegistrationStatusEnum::EMAIL_SENT) {
            return $this->errorResponse('it has an error, invalid token', 401);
        }
        if(Carbon::parse($userRegistration->valid_token)->lt(Carbon::now())) {
            return $this->errorResponse('it has an error, the token is expired', 401);
        }
        $request->request->add(['userRegistration' => $userRegistration]);
        return $next($request);
    }
}
