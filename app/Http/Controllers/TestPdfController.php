<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TestPdfController extends Controller
{
    public function generate()
    {
        $data = [
            'titre' => 'Test de reçu PDF',
            'nom' => 'Eunice',
            'date' => now()->format('d/m/Y H:i'),
            'message' => 'Ceci est un test de génération PDF dans Laravel.',
        ];

        $pdf = Pdf::loadView('pdf.test', $data);
        return $pdf->download('test_recu.pdf');
    }
}