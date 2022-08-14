<!DOCTYPE html>
<html class="h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Magic the Gathering EDH Precon League Tracking">
        <meta name="author" content="DavieJJ">
        <title>Precon League</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <meta name="theme-color" content="#712cf9">
    </head>
    <body class="container text-cente">
        <header>
            @include('PreconLeagueViews::includes.header')
        </header>

        <main>
            @switch($content)
                @case('match')
                    @include('PreconLeagueViews::match')
                @break

                @case('matchlist')
                    @include('PreconLeagueViews::matchlist')
                @break

                @default
                    @include('PreconLeagueViews::index')
                @break
            @endswitch
        </main>

        <footer>
            @include('PreconLeagueViews::includes.footer')
        </footer>
    </body>
    <footer>
        @include('PreconLeagueViews::includes.footer-scripts')
    </footer>
</html>
