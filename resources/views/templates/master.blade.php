<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'P3 ...' --}}
        @yield('title','P3 - Generator of Lorem Ipsum')
    </title>

    <meta charset='utf-8'>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/css/main.css" type='text/css' rel='stylesheet'>
    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

 <div class='container' id='roundc'>

   {{-- Main page content will be yielded here --}}
   @yield('content')

 </div>

 @yield('footer')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    {{-- Yield any page specific JS files or anything else at the end of the body --}}
    @yield('body')
<br><br>
</body>
</html>
