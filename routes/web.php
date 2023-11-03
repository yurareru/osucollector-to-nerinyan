<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return Inertia::render('Index');
});

Route::get('/{col_id}', function ($col_id) {
  try {
    $beatmapsets = json_decode(file_get_contents("https://osucollector.com/api/collections/{$col_id}"), true)['beatmapsets'];

    foreach ($beatmapsets as $beatmapset) {
      $id = $beatmapset['id'];
      $urls[] = "https://api.nerinyan.moe/d/{$id}?nv=1";
    }

    $content = implode("\n", $urls);

    return response($content)
      ->header('Content-Type', 'text/plain');
  } catch (Exception $e) {
    return abort(404);
  }
});

Route::post('/', function (Request $request) {
  $request->validate([
    'input' => 'required',
  ]);
  return Inertia::location('/' . $request->input);
});

