<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportPdf(User $user) {
        $usr = $user;
        $fileName = 'curriculum-vitae' . now()->format('Ymd_His') . '.pdf';
        $pdfFile = app('dompdf.wrapper')->loadView('dashboard.exports.pdf', ['user' => $usr]);

        return $pdfFile->download($fileName);
    }
}
