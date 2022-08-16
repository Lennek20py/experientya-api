<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => function () use ($request) {
                return [
                    'company' => $request->user() ? [
                        'id' => $request->user()->id,
                        'company_name' => $request->user()->company_name,
                        'email' => $request->user()->email,
                        'company_phone_number' => $request->user()->company_phone_number,
                        'company_address' => $request->user()->company_address,
                        'company_postal_code' => $request->user()->company_postal_code,
                        'company_fiscal_address' => $request->user()->company_fiscal_address,
                        'RFC' => $request->user()->RFC,
                        'responsible_first_name' => $request->user()->responsible_first_name,
                        'responsible_last_name' => $request->user()->responsible_last_name,
                        'responsible_phone_number' => $request->user()->responsible_phone_number,
                        'profile_photo_path' => asset('storage/'.$request->user()->profile_photo_path)
                    ] : null,
                ];
            },
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                    'message' => session('message'),
                ];
            },
            'flash2' => [
                'message' => session('message'),
            ],
            'success' => [
                'message' => fn () => $request->session()->get('message')
            ]
        ]);
    }
}
