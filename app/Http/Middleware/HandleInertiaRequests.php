<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Middleware;
use Native\Mobile\Facades\System;

final class HandleInertiaRequests extends Middleware
{
    /**
     * @var string
     */
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'device' => Inertia::once(fn (): array => [
                'is_mobile' => System::isMobile(),
                'is_ios' => System::isIOS(),
                'is_android' => System::isAndroid(),
            ]),
        ];
    }
}
