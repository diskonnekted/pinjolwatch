<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LegalPinjol;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $id = 60; // AdaPundi
        $pinjol = LegalPinjol::find($id);
        
        if ($pinjol) {
            $links = $pinjol->news_links ?? [];
            
            $newLinks = [
                [
                    'title' => 'KPPU Denda 97 Pinjol Kasus Kartel Bunga (TradingView)',
                    'url' => 'https://id.tradingview.com/news/kontan:09bd370e587ea:0/'
                ],
                [
                    'title' => 'Penyalahgunaan Data dan Pelanggaran Etika AdaPundi',
                    'url' => 'https://mediakonsumen.com/2025/06/21/surat-pembaca/penyalahgunaan-data-dan-pelanggaran-etika-oleh-pinjol-adapundi'
                ]
            ];

            foreach ($newLinks as $newLink) {
                $exists = false;
                foreach ($links as $link) {
                    if (isset($link['url']) && $link['url'] === $newLink['url']) {
                        $exists = true;
                        break;
                    }
                }
                if (!$exists) {
                    $links[] = $newLink;
                }
            }

            $cases = $pinjol->notable_cases ?? "";
            $mention = "\nTerdapat laporan serius mengenai penyalahgunaan data pribadi dan pelanggaran etika penagihan. Juga termasuk dalam daftar pinjol yang diproses KPPU terkait denda kartel bunga.";
            
            if (strpos($cases, "penyalahgunaan data") === false) {
                $cases .= $mention;
            }

            $pinjol->update([
                'news_links' => $links,
                'notable_cases' => $cases
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
