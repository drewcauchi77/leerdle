<?php

declare(strict_types=1);

use App\Http\Middleware\HandleInertiaRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Native\Mobile\Facades\System;

test('shares all data correctly with authenticated user', function (): void {
    System::shouldReceive('isMobile')
        ->once()
        ->andReturn(true);
    System::shouldReceive('isIOS')
        ->once()
        ->andReturn(true);
    System::shouldReceive('isAndroid')
        ->once()
        ->andReturn(false);

    $user = User::factory()->create();
    $request = Request::create('/');
    $request->setUserResolver(fn () => $user);

    $middleware = new HandleInertiaRequests();
    $shared = $middleware->share($request);

    expect($shared)
        ->toHaveKeys([
            'device',
            'auth',
            'errors',
        ]);

    /** @var callable(): array{is_mobile: bool, is_ios: bool, is_android: bool} $deviceCallable */
    $deviceCallable = $shared['device'];

    expect($deviceCallable())
        ->toBe([
            'is_mobile' => true,
            'is_ios' => true,
            'is_android' => false,
        ])
        ->and($shared['auth'])->toBeArray()
        ->toHaveKey('user');

    /** @var array{user: User} $auth */
    $auth = $shared['auth'];

    expect($auth['user'])
        ->toBeInstanceOf(User::class)
        ->and($auth['user']->id)
        ->toBe($user->id);
});

test('shares null user when not authenticated', function (): void {
    $request = Request::create('/');

    $middleware = new HandleInertiaRequests();
    $shared = $middleware->share($request);

    expect($shared)->toBeArray()
        ->toHaveKey('auth')
        ->and($shared['auth'])
        ->toBeArray()
        ->toHaveKey('user');

    /** @var array{user: User|null} $auth */
    $auth = $shared['auth'];

    expect($auth['user'])->toBeNull();
});

test('version returns parent version', function (): void {
    $request = Request::create('/');
    $middleware = new HandleInertiaRequests();

    expect($middleware->version($request))->toBeString();
});
