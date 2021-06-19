<html>
    <head>
        <title> OG test app</title>
    </head>
    <body>
        <header>
            <ul>
                <li><a href="{{ route('xml_example.index') }}">XML</a></li>
                <li><a href="{{ route('soap_example.index') }}">SOAP</a></li>
                <li><a href="{{ route('mvc_example.index') }}">MVC</a></li>
            </ul>
        </header>
        <body>
            @yield('content')
        </body>
    </body>
</html>
