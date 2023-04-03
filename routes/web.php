<?php

use Illuminate\Support\Facades\DB;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;


Route::get('/', function () {
  $visited = DB::select('select * from places where visited = ?', [1]);
  $togo = DB::select('select * from places where visited = ?', [0]);

  return view('travel_list', ['visited' => $visited, 'togo' => $togo ] );
});

Route::get('/generate', function () {
    $data = [
        'foo' => 'bar'
    ];
    $pdf = LaravelMpdf::loadView('pdf.document', $data);
    return $pdf->stream('document.pdf');
});
