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
            // get the topic
            $topic = Topic::find($id);

            // show the view and pass the topic to it
            return View::make('topics.show')
                ->with('topic', $topic);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            // get the nerd
           $topic = Topic::find($id);

           // show the edit form and pass the nerd
           return View::make('topics.edit')
               ->with('topic', $topic);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
           // validate
           // read more on validation at http://laravel.com/docs/validation
           $rules = array(
               'name'       => 'required',
           );
           $validator = Validator::make(Input::all(), $rules);

           // process the login
           if ($validator->fails()) {
               return Redirect::to('topics/' . $id . '/edit')
                   ->withErrors($validator)
                   ->withInput(Input::except('password'));
           } else {
               // store
               $topic = Topic::find($id);
               $topic->name = Input::get('name');
               $topic->save();

               // redirect
               Session::flash('message', 'Successfully updated topic!');
               return Redirect::to('topics');
           }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
            // delete
            $topic = Topic::find($id);
            $topic->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the topic!');
            return Redirect::to('topics');
	}
}
