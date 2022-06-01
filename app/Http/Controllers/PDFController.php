<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
 
class PDFController extends Controller
{
    public function preview(){
        return view('chart');
    }
  
    public function download(){
        $render = view ('chart')->render();
  
        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('report.pdf'));
   
        return response()->download(public_path('report.pdf'));
    }
}