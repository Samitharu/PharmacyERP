<?php

namespace App\Http\Controllers;

use App\Models\User;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;
use Mpdf\Mpdf;

class samplepdfController_copy extends Controller
{
    public function displayReport(Request $request)
{
    $userdata = DB::select('SELECT C.customer_code,C.customer_name,C.primary_address,C.disctrict_id FROM customers C');

    $pdf = new Mpdf([
        'format' => 'A4',
        'orientation' => 'P',
    ]);
    $pdf->SetFooter('{PAGENO}'); 
    // Load the view and write to the PDF
    $view = view('pdf_n', ['userdata' => $userdata])->render();
    $pdf->WriteHTML($view);

    // Set footer with only page number
  

    // Output the PDF as a stream
    return response()->stream(
        function () use ($pdf) {
            $pdf->Output('users_report.pdf', 'I');
        },
        200,
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="users_report.pdf"',
        ]
    );
}
}