<!-- app/views/topics/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('topics') }}">Topic Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('topics') }}">View All Topics</a></li>
        <li><a href="{{ URL::to('topics/create') }}">Create a Topic</a>
    </ul>
</nav>

<h1>Showing {{ $topic->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $topic->name }}</h2>        
    </div>

</div>
</body>
</html>