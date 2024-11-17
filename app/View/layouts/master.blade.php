<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
       
        @if (session()->has('success'))
            <div class="succes">
                {{session()->get('success') }}
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

    
    <div>
        @yield('content')
    </div>
</div>
</body>
</html>