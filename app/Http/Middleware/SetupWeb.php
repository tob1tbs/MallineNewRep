<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

use App\Modules\Main\Models\WebParameter;

class SetupWeb
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
		$WebParameter = new WebParameter();
		$WebParameterData = WebParameter::find(1);

		if($WebParameterData->active == 0) {
            return redirect()->route('actionDashboardSetup');
		}
        return $next($request);
    }
}
