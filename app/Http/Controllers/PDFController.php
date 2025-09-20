<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import the PDF facade

class PDFController extends Controller
{

    private function generateGenericPDF($viewName, $data, $options = [])
    {
        $pdf = Pdf::loadView($viewName, ['data' => $data]);
        if (isset($options['paper'])) {
            $orientation = $options['orientation'] ?? 'portrait'; // Default to 'portrait'
            $pdf->setPaper($options['paper'], $orientation);
        }
        if (isset($options['dpi'])) {
            $pdf->setOption(['dpi' => $options['dpi']] ?? 96);
        }
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('javaScriptDelay', $options['js_delay'] ?? 500);
        $pdf->setOption('zoom', $options['zoom'] ?? 1);


        $filename = $options['filename'] ?? 'document.pdf';
        return $pdf->stream($filename);
    }
}
