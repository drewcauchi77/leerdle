@use(\Native\Mobile\Facades\System)

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if(System::isMobile())
            @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        @else
            @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"], 'build-web')
        @endif
        @inertiaHead
    </head>
    <body class="font-sans antialiased nativephp-safe-area">
        @inertia

        @if(System::isMobile())
            @verbatim
                <native:bottom-nav>
                    <native:bottom-nav-item id="home" icon="home" label="Home" url="/" />
                    <native:bottom-nav-item id="about" icon="user" label="about" url="/about" />
                    <native:bottom-nav-item id="test" icon="flashlight_on" label="test" url="/" />
                </native:bottom-nav>
            @endverbatim
        @endif
    </body>
</html>
