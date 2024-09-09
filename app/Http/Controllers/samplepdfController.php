<?php

namespace App\Http\Controllers;

use App\Models\User;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;
use Mpdf\Mpdf;

class samplepdfController extends Controller
{
    public function displayReport(Request $request)
    {
        // Fetch customer data from the database
        $userdata = DB::select("SELECT C.customer_code, C.customer_name, C.primary_address, C.disctrict_id FROM customers C WHERE disctrict_id IN ('1','18','20')");

        // Group data by district_id
        $groupedData = [];
        foreach ($userdata as $user) {
            $districtId = $user->disctrict_id;
            if (!isset($groupedData[$districtId])) {
                $groupedData[$districtId] = [];
            }
            $groupedData[$districtId][] = $user;
        }

        // Create an Mpdf instance with A4 page format and portrait orientation
        $pdf = new Mpdf([
            'format' => 'A4',
            'orientation' => 'P',
        ]);

      
        $pdf->SetFooter('{PAGENO}'); 

        // Load the view, pass grouped data to it, and render it as HTML
        $view = view('pdf', ['groupedData' => $groupedData])->render();
        $pdf->WriteHTML($view);

        // Stream the PDF back to the browser for inline viewing
        return response()->stream(
            function () use ($pdf) {
                $pdf->Output('customer_report.pdf', 'I');
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="users_report.pdf"',
            ]
        );
    }
}
