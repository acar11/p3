 @extends('templates.master')

 @section('content')

<br>
<a href='/'>&nbsp; &larr; home</a>

	<h1>&nbsp;&nbsp;&nbsp;User Generator</h1>

	<form method="POST" action="/show_users">
    {{ csrf_field() }}
		<label for="users">&nbsp;&nbsp;&nbsp;&nbsp;How many users?</label>
    <input maxlength="2" name="users" type="text" value=""> (Max: 99)
		<br>

		&nbsp;&nbsp;&nbsp;&nbsp;Optionally Include...
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;<input name="email" type="checkbox">		<label for="birthdate">Email</label>		<br>

		&nbsp;&nbsp;&nbsp;&nbsp;<input name="web" type="checkbox">		<label for="profile">Web Address</label>		<br>

		<input name="" type="hidden" value="">
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Generate!">
  </form>

  @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  @endif
