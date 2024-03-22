<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

  

class WordToPDFController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index(Request $request)

    {

        return view('wordToPDF');

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function store(Request $request)

    {

         $fileName = time().'.'.$request->file->extension();  

         $request->file->move(public_path('uploads'), $fileName);

  

         $domPdfPath = base_path('vendor/dompdf/dompdf');

  

         \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);

         \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF'); 

         $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('uploads/'.$fileName)); 

         $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');

  

         $pdfFileName = time().'.pdf';

         $PDFWriter->save(public_path('uploads/'.$pdfFileName)); 

  

         return response()->download(public_path('uploads/'.$pdfFileName));

    }

}