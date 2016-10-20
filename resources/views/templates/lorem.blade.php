 @extends('templates.master')

 @section('content')

 <br>
	&nbsp; <a href='/'>&larr; home</a>

	<h1>&nbsp;&nbsp;Lorem Ipsum Text Generator</h1>

	<p>&nbsp;&nbsp;&nbsp;&nbsp;How many paragraphs requested?</p>

  <form method='POST' action='/lorem_result'>

    {{ csrf_field() }}
		<label for="paragraphs">&nbsp;&nbsp;&nbsp;&nbsp;Paragraphs needed: </label>
		<input maxlength="2" name="paragraphs" type="text" value="" id="paragraphs" size="5"> (Max: 99)

		<br><br>

		&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Generate!">
  </form>

  @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  @endif
