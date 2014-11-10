<?php

class TopicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
             // get all the nerds
            $topics = Topic::all();

            // load the view and pass the nerds
            return View::make('topics.index')
                ->with('topics', $topics);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
              //
             return View::make('topics.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	                                 
               $rules = array(
                   'name'       => 'required',
              //    'email'      => 'required|email',                   
               );
               $validator = Validator::make(Input::all(), $rules);

               // process the login
               if ($validator->fails()) {
                   return Redirect::to('topics/create')
                       ->withErrors($validator)
                       ->withInput(Input::except('password'));
               } else {
                   // store
                   $topic = new Topic;
                   $topic->name       = Input::get('name');
                 //  $nerd->email      = Input::get('email');
                 //  $nerd->nerd_level = Input::get('nerd_level');
                   $topic->save();

                   // redirect
                   Session::flash('message', 'Successfully created topic!');
                   return Redirect::to('topics');
               }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
