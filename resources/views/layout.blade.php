
{{--The layout template allows us to reuse front end markup which is popular throughout our project--}}
{{--like html templates.--}}
{{---
you are able to specify the areas which will have content using the yield blade expression passing it a keyword
access this variable by using the section expression with the keyword passed to it
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
    <link rel="stylesheet" href="{{elixir('css/test.css')}}">
</head>
<body>
    <div class="container">
        @yield('content')

        @yield('footer')
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.8/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>
    {{--<script src="{{asset('/js/main.js')}}"></script>--}}
    @yield('custom_scripts')
</body>
</html>
