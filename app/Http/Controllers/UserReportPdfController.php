<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class UserReportPdfController extends Controller
{
    public function download(Request $request, $ticket)
    {
        $report = Report::with(['kabupaten.province', 'threatType', 'legalPinjol', 'evidence'])
            ->where('ticket_id', $ticket)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $logoData = base64_encode(file_get_contents(public_path('pw-logo.png')));
        $logoSrc = 'data:image/png;base64,' . $logoData;

        // Decrypt image evidence for embedding
        $evidenceItems = [];
        foreach ($report->evidence as $ev) {
            $isImage = str_starts_with($ev->mime_type, 'image/');
            $base64 = null;
            if ($isImage) {
                try {
                    $decrypted = '';
                    $path = \Illuminate\Support\Facades\Storage::disk('local')->path($ev->encrypted_path);
                    if (file_exists($path)) {
                        $source = fopen($path, 'rb');
                        while (!feof($source)) {
                            $line = fgets($source);
                            if (trim($line) !== '') {
                                $decrypted .= \Illuminate\Support\Facades\Crypt::decrypt($line);
                            }
                        }
                        fclose($source);
                        $base64 = 'data:' . $ev->mime_type . ';base64,' . base64_encode($decrypted);
                    }
                } catch (\Exception $e) {
                    // Skip if decryption fails
                }
            }
            $evidenceItems[] = [
                'original_name' => $ev->original_name,
                'is_image' => $isImage,
                'base64' => $base64,
                'mime_type' => $ev->mime_type,
            ];
        }

        $pdf = Pdf::loadView('reports.user-pdf', [
            'report' => $report,
            'logoSrc' => $logoSrc,
            'evidenceItems' => $evidenceItems,
        ])->setPaper('a4', 'portrait');

        return $pdf->download('Laporan_PinjolWatch_' . $report->ticket_id . '.pdf');
    }
}
