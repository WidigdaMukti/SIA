<?php

namespace App\Http\Controllers;

use App\Filament\SiaSiswa\Resources\RaportSiswaResource;
use App\Models\RaportSiswa;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import namespace model User
use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\PDF;
use Filament\Infolists\Infolist;
// use Barryvdh\DomPDF\Facade as PDF;

class PdfExportController extends Controller
{
    public function index()
    {
        $dataRaport = RaportSiswa::first();
        return view('exports.pdf', compact('dataRaport'));
    }

    public function showPdf($id)
    {
        // Retrieve data RaportSiswa based on $id
        $dataRaport = RaportSiswa::find($id); // Example based on ID, adjust as needed

        // Return the view 'exports.pdf' with the dataRaport variable
        return view('exports.pdf', compact('dataRaport'));
    }

    // public function exportPdf($id)
    // {
    //     // Retrieve data RaportSiswa based on $id
    //     $dataRaport = RaportSiswa::find($id);

    //     // Load the view and pass the data
    //     $html = view('exports.pdf', compact('dataRaport'))->render();

    //     // Instantiate and use the dompdf class
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($html);

    //     // (Optional) Setup the paper size and orientation
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the generated PDF to Browser
    //     return $dompdf->stream('raport-siswa.pdf', ['Attachment' => 1]);
    // }

    public function downloadPdf($id)
    {
        // Retrieve data RaportSiswa based on $id
        $dataRaport = RaportSiswa::find($id);

        if (!$dataRaport) {
            abort(404); // Handle not found scenario
        }

        // Instantiate DomPDF with options
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Load the view and pass the data
        $html = view('exports.pdf', compact('dataRaport'))->render();
        $dompdf->loadHtml($html);

        // Render the PDF
        $dompdf->render();

        // Stream the PDF with the name 'raport-siswa.pdf'
        return $dompdf->stream('raport-siswa.pdf');
    }

    // public function generatePdf(Request $request)
    // {
    //     // Buat objek Infolist (asumsikan Anda tahu cara membuatnya)
    //     $infolist = new Infolist(); // Pastikan ini objek Infolist yang sesuai

    //     // Panggil method infolist dari RaportSiswaResource dengan objek Infolist sebagai argumen
    //     $result = RaportSiswaResource::infolist($infolist);

    //     // Render view 'pdf.infolist' dengan data $infolist ke dalam PDF
    //     $pdf = PDF::loadView('pdf.infolist', compact('infolist'));

    //     // Optional: Set nama file PDF yang akan di-download
    //     $pdf->setPaper('A4', 'portrait');

    //     // Return PDF sebagai response
    //     return $pdf->stream('infolist.pdf');
    // }
}
