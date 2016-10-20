@extends('templates.master')

@section('title')
    Show Lorem-Ipsum Text Results
@stop

@section('content')
    @if($results)
       {!! $results !!} 
    @else
      <p> We have a problem, please try again. </p>
    @endif
    <br><br>
@stop

<br>
<a href='/lorem'>&nbsp; &larr; back to lorem-ipsum</a>
<br>
