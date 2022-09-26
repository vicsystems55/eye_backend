<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    //

    
    public function generate_cert(Request $request)
    {
        # code...

        $pdf = PDF::loadView('pdf.ticket', [
            'name' => 'name',
            'lottery_code' => 'lottery code',
            'logo_url' => config('app.url').'images/reliance_logo.png',
        ])->setPaper('a4', 'landscape')->setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        
        ]);

      

        $file_name = rand(123, 1233);
            
        return $file = Storage::put('public/receipts/'.$file_name.'.pdf', $pdf->output());

    }


}
