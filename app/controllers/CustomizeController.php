<?php

use Rescue\ReactionImage\ReactionImage;

class CustomizeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /customize
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /customize/create
	 *
	 * @return Response
	 */
	public function create($filename)
	{
		$imageFile = ReactionImage::getByFilename($filename);

		return View::make('customize.create', ['imageFile' => $imageFile]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /customize
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = $_POST['imagedata'];

		$image = Image::make($data);

		$image->save('images/reactions/customized/test.jpg');
	}

	/**
	 * Display the specified resource.
	 * GET /customize/{id}
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
	 * GET /customize/{id}/edit
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
	 * PUT /customize/{id}
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
	 * DELETE /customize/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}