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


        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet" />
<style>

.m {
    font-family: 'Montserrat';
}

.t {
    font-family: 'Tangerine';
}

</style>
</head>
<body>
    <p class="m">
        Montserrat
    </p>
    <p class="t">
        Tangerine
    </p>
</body>
</html>
HTML
;

        $pdf = PDF::loadHtml($html)->setPaper(array(0, 0, 585, 800), 'landscape')->setOptions([
        
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        
        ]);

      

        $file_name = rand(123, 1233);
            
        return $file = Storage::put('public/receipts/'.$file_name.'.pdf', $pdf->output());

    }


}
