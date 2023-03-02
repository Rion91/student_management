<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class ApiPaginator
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $data = $response->getData(true);

        if ($request->get('per_page') !== 'ALL') {
            $slice = Arr::only($data['data'], ['current_page', 'data', 'per_page', 'total']);
        } else {
            $slice['current_page'] = 1;
            $slice['data'] = $data['data'];
            $slice['per_page'] = 'all';
            $slice['total'] = count($data['data']);
        }
        $data['data'] = $slice;

        $response->setData($data);

        return $response;
    }
}
