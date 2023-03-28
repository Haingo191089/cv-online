<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('shared.head')

        @hasSection('page_head')
            @yield('page_head')
        @endif
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @hasSection('bottom_script')
            @yield('bottom_script')
        @endif
    </body>
</html>
