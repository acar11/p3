<?php

namespace App\Http\Controllers;

use joshtronic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;

class P3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('templates.index')->with('content');
    }

    /**
     * Show the form for creating lorem-ipsum text.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.lorem')->with('content');
    }

    /**
     * Display the LoremIpsum text requested by the user.

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response

    */
    public function show_lorem_text(Request $request) {

      # Validate the requested data
      $this->validate($request, [
          'paragraphs' => 'Required|Integer|Min:1|Max:99',
      ]);

      # If the code makes it here, you can assume the validation passed
      $user_para_request = $request->input('paragraphs');

      $gen = new joshtronic\LoremIpsum();

      # If using words
      $word = $gen->word($user_para_request);
      $words = $gen->words($user_para_request);
      # If  using senteces
      $sentence = $gen->sentence($user_para_request);
      $sentences = $gen->sentences($user_para_request);
      # If using arrays of words ... sentenceArray or paragraphArray
      $warray = $gen->wordsArray($user_para_request);
      # If using paragraphs
      $paragraph = $gen->paragraph($user_para_request);
      #$para = $gen->paragraphs($user_para_request); # no p tag included
      $para = $gen->paragraphs($user_para_request, 'p');

      return view('templates.show_lorem_text')->with('results', $para);

    }

    /**
     * Show the form for creating new users profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('templates.users')->with('content');
    }

    /**

     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_users(Request $request)
    {
      # Validate the request data
      $this->validate($request, [
          'users' => 'Required|Integer|Min:1|Max:99',
      ]);

      # If the code makes it here, you can assume the validation passed
      $user_request = $request->input('users');
      $user_email   = $request->input('email');
      $user_web     = $request->input('web');

      $file_loc = Storage::url('app/names_data.csv');
      #$file = Storage::disk('local')->put('names_data.csv', 'Contents');
      $filename = base_path('storage/app/names_data.csv');

      $file = fopen($filename, "r");
      #$file = Input::file($filename);

      $all_names  = array();
      $all_emails = array();
      $all_web    = array();

      while( ($data = fgetcsv($file, 200, ",")) !== FALSE) {

        $names_data = $data[0]." ".$data[1];
        $email_data = $data[10];
        $web_data   = $data[11];

        array_push( $all_names, $names_data);
        array_push( $all_emails, $email_data);
        array_push( $all_web, $web_data);

      }
      #var_dump($all_web);
      # How many names
      $get_names = array_rand(array_flip($all_names), $user_request);

      $arr_length = count($get_names);
      $pwd = '';
      for( $x=0; $x<$arr_length; $x++ ) {

        # Just names
        if($user_request && !$user_email && !$user_web){

          $pwd .= '<p>'.$get_names[$x].'</p>';
          // Remove the last - from the result string
          $result = substr($pwd, 0, -1);

        }
        # Names and Email
        if($user_request && $user_email && !$user_web){

          $email = array_rand(array_flip($all_emails), 1);
          $pwd .= '<p>'.$get_names[$x]." | ".$email.'</p>';
          // Remove the last - from the result string
          $result = substr($pwd, 0, -1);

        }
        # Names and Web Address
        if($user_request && !$user_email && $user_web){

          $web = array_rand(array_flip($all_web), 1);
          $pwd .= '<p>'.$get_names[$x]." | ".$web.'</p>';
          // Remove the last - from the result string
          $result = substr($pwd, 0, -1);

        }
        # Names, email and Web Address
        if($user_request && $user_email && $user_web){

          $email = array_rand(array_flip($all_emails), 1);
          $web   = array_rand(array_flip($all_web), 1);
          $pwd .= "<p>".$get_names[$x]." | ".$email." | ".$web.'</p>';
          // Remove the last - from the result string
          $result = substr($pwd, 0, -1);

        }

      }

      # make a view in
      return view('templates.show_names')->with('result', $result);

    }

}
