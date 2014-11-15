<?php

class TopicAPIController extends \BaseController {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            try{
                $statusCode = 200;
                $response = [
                  'topics'  => []
                ];
                
                $topics = Topic::all();
                foreach($topics as $topic){

                    $response['topics'][] = [
                        'id' => $topic->id,
                        'name' => $topic->name
                    ];
                }

            }catch (Exception $e){
                $statusCode = 400;
            }
            
           return Response::json($response, $statusCode);            
	}
}
