<?php

class HomeController extends BaseController
{

    public function user()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // get POST data
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userdata)) {
                // we are now logged in, go to show topics
                return Redirect::action('TopicController@index')->with('message', 'Login successfully!!!');
                 //return Redirect::to('admin');
            } else {
                return Redirect::to('/');
            }
        }
    }

    // logout the user
    public function doLogout()
    {
        Auth::logout(); 
        return Redirect::to('login'); // redirect the user to the login screen
    }

}
