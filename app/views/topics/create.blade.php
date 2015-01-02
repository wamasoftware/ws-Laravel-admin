<!-- app/views/topics/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <!-- include require jQuery library -->
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/standard/ckeditor.js') }}
    {{ HTML::script('js/adapters/jquery.js') }}
    <!-- End - include require jQuery library -->
    
    <script type="text/javascript">
        jQuery( document ).ready( function() {
           jQuery( 'textarea#editor' ).ckeditor();
	
    } );
    </script>
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

<h1>Create a Topic</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'topics')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description',Input::old('description'),array('class' => 'ckeditor')) }}
        {{Form::label('stutus', 'Active/In-Active')}}
        {{Form::checkbox('status')}}
    </div>
    {{ Form::submit('Create the Topics!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>