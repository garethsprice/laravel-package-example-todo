<?php
/*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Render a nice looking todo list
Route::get('/todo', function()
{
  return View::make('todo::todo', array('items' => Session::get('items')));
});

// 
Route::post('/todo/add', function()
{
  $items = Session::get('items', array());
  array_push($items, Input::get('item'));
  Session::put('items', $items);
  return Redirect::to('/todo');
});

Route::get('/todo/delete/{id}', function($id)
{
  $items = Session::get('items', array());
  unset($items[$id]);

  sizeof($items) > 0 ? Session::put('items', $items) : Session::forget('items');

  return Redirect::to('/todo');
})->where(array('id' => '[0-9]+'));