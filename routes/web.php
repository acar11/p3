<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

#Route::get('/', function () {
#    return view('welcome');
#});

Route::get('/', 'P3Controller@index')->name('p3s.index'); #
Route::get('lorem', 'P3Controller@create')->name('lorems.create'); #
Route::get('user', 'P3Controller@profile')->name('users.profile'); #

Route::post('lorem_result', 'P3Controller@show_lorem_text')->name('lorem_results.show_lorem_text'); #

Route::post('show_users', 'P3Controller@show_users')->name('show_users.show_users'); #

Route::post('test-lorem_result', function() {

  $gen = new joshtronic\LoremIpsum();

  $word = $gen->word();
  $words = $gen->words(11);
  #return $words;

  $sentence = $gen->sentence();
  $sentences = $gen->sentences(5);
  #return $sentence;

  $paragraph = $gen->paragraph();
  $paragraphs = $gen->paragraphs(2);
  $para = $gen->paragraphs(4, 'p');
  $warray = $gen->wordsArray(5); #sentenceArray or paragraphArray

  return $para;

});



Route::get('/newpack/{numb?}/{type?}', function( $numb = '', $type = '') {

  if($numb) {

    $gen = new joshtronic\LoremIpsum();

    #$word = $gen->word();
    $words = $gen->words($numb);
    #return $words;

    #$sentence = $gen->sentence();
    $sentences = $gen->sentences($numb, 'p');
    #return $sentence;

    #$paragraph = $gen->paragraph();
    #$paragraphs = $gen->paragraphs(2);
    $paragraphs = $gen->paragraphs($numb, 'p');
    #$warray = $gen->wordsArray(5); #sentenceArray or paragraphArray
    #return $paragraphs;
    if( $type == 'word') {
      return $words;
    }elseif ( $type == 'sent') {
      return $sentences;
    }else {
      return $paragraphs;
    }

  }else{

    return "You didnt enter the number of paragraph(s) you want for your lorem-ipsum text
          please try again.";
  }

});
