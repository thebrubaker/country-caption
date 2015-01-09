<?php

class ReactionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reactions
	 *
	 * @return Response
	 */
	public function showPopular()
	{
		return View::make('reactions.popular');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reactions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reactions
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /reactions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		return View::make('reactions.view');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /reactions/{id}/edit
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
	 * PUT /reactions/{id}
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
	 * DELETE /reactions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}