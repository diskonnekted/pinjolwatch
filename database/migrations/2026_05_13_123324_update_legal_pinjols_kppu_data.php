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
        $bloombergLink = [
            'title' => 'Daftar 97 Pinjol Kena Denda Kasus Kartel Bunga (KPPU)',
            'url' => 'https://www.bloombergtechnoz.com/detail-news/104296/daftar-97-pinjol-kena-denda-rp755-miliar-di-kasus-kartel-bunga'
        ];

        $mention = "Terlibat dalam kasus dugaan kartel suku bunga yang diselidiki KPPU, di mana 97 platform fintech lending terancam denda total Rp755 miliar.";

        LegalPinjol::chunk(100, function ($pinjols) use ($bloombergLink, $mention) {
            foreach ($pinjols as $pinjol) {
                $links = $pinjol->news_links ?? [];
                
                // Check if already added
                $alreadyAdded = false;
                foreach ($links as $link) {
                    if (isset($link['url']) && $link['url'] === $bloombergLink['url']) {
                        $alreadyAdded = true;
                        break;
                    }
                }
                
                if (!$alreadyAdded) {
                    $links[] = $bloombergLink;
                }
                
                $cases = $pinjol->notable_cases ?? "";
                if (strpos($cases, "KPPU") === false) {
                    $cases .= (empty($cases) ? "" : "\n\n") . $mention;
                }

                // Special handling for AdaModal (adding the specific complaints)
                if (strpos($pinjol->app_name, 'AdaModal') !== false) {
                    $specificMention = "\nTerdapat laporan pengguna mengenai ketidaksesuaian jumlah dana yang diterima dengan yang diajukan. Penagihan dilaporkan cukup agresif bahkan jika keterlambatan baru satu hari.";
                    if (strpos($cases, "ketidaksesuaian jumlah dana") === false) {
                        $cases .= $specificMention;
                    }

                    $mediaKonsumen = [
                        'title' => 'Uang Masuk AdaModal Tidak Sesuai Jumlah yang Diajukan',
                        'url' => 'https://mediakonsumen.com/2022/06/11/surat-pembaca/uang-masuk-dari-pinjol-adamodal-tidak-sesuai-dengan-jumlah-yang-diajukan'
                    ];
                    $jabarLink = [
                        'title' => 'Dampak Telat Bayar AdaModal Meski Cuma Sehari',
                        'url' => 'https://jabarpublisher.com/2023/01/16/parah-ini-yang-terjadi-jika-anda-telat-bayar-pinjol-adamodal-meski-cuma-sehari/'
                    ];

                    $hasMedia = false;
                    $hasJabar = false;
                    foreach ($links as $link) {
                        if (isset($link['url']) && $link['url'] === $mediaKonsumen['url']) $hasMedia = true;
                        if (isset($link['url']) && $link['url'] === $jabarLink['url']) $hasJabar = true;
                    }

                    if (!$hasMedia) $links[] = $mediaKonsumen;
                    if (!$hasJabar) $links[] = $jabarLink;
                }
                
                $pinjol->update([
                    'news_links' => $links,
                    'notable_cases' => $cases
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
