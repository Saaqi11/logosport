<?php

namespace App\Http\Middleware;

use App\Models\Contest;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckContestStep
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = request()->segment(count(request()->segments()));
        if (!empty($id)) {
            $contest = Contest::find($id);
            $route = "";
            if ($request->get("is-edit")) {
                switch ($contest->score) {
                    case 20:
                        $route = "customer.contest.type";
                        break;
                    case 40:
                        $route = "customer.contest.color";
                        break;
                    case 50:
                        $route = "customer.contest.style";
                        break;
                    case 60:
                        $route = "customer.contest.brief";
                        break;
                    case 80:
                        $route = "customer.contest.condition";
                        break;
                }
                if ($route) {
                    return redirect()->route($route, [$contest->id]);
                }
            }
            if (!empty($contest)) {
                return $next($request);
            }
        }
        return redirect()->route("customer.contest.price")->with("Please create any contest!");
    }
}
