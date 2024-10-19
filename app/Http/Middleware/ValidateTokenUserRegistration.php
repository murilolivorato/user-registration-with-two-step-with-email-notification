<?php

namespace App\Http\Middleware;

use App\Models\UserRegistration;
use Closure;
use Illuminate\Http\Request;
use Modules\Contracts\Entities\Contrato;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
class ValidateTokenUserRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userRegistration = UserRegistration::where('token', $request->token)->first();
        if(!$userRegistration) {
            return $this->failure('it has an error, invalid token', 401);
        }
        if(Carbon::parse($userRegistration->valid_token)->lt(Carbon::now())) {
            return $this->failure('it has an error, the token is expired', 401);
        }
        $request->request->add(['userRegistration' => $userRegistration]);
        return $next($request);
    }
}
