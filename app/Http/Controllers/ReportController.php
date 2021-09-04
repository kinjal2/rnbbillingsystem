<?php

namespace App\Http\Controllers;

use PDF;

class ReportController extends Controller {
    public function generate_pdf()
 {
        $data = [
            'foo' => 'bar'
        ];
        //$pdf = PDF::loadView( 'pdf.document', $data );
        //return $pdf->stream( 'document.pdf' );
        echo 'hello';
    }
}
