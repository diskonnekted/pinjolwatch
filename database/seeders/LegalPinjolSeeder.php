<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LegalPinjolSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [1, 'PT Pasar Dana Pinjaman', 'Danamas', 'KEP-49/D.05/2017', '06 Juli 2017', 'Konvensional', 'https://p2p.danamas.co.id/', 'Android'],
            [2, 'PT Amartha Mikro Fintek', 'Amartha', 'KEP-46/D.05/2019', '13 Mei 2019', 'Konvensional', 'https://amartha.com/', 'Android'],
            [3, 'PT Indo Fin Tek', 'Dompet Kilat', 'KEP-47/D.05/2019', '13 Mei 2019', 'Konvensional', 'https://dompetkilat.co.id/', 'Android'],
            [4, 'PT Creative Mobile Adventure', 'Boost', 'KEP-48/D.05/2019', '13 Mei 2019', 'Konvensional', 'https://www.myboost.co.id', '-'],
            [5, 'PT Toko Modal Mitra Usaha', 'Tokomodal', 'KEP-49/D.05/2019', '24 Mei 2019', 'Konvensional', 'https://www.tokomodal.co.id/', 'Android'],
            [6, 'PT Mitrausaha Indonesia Grup', 'Modalku', 'KEP-81/D.05/2019', '30 September 2019', 'Konvensional', 'https://modalku.co.id/', 'Android'],
            [7, 'PT Pendanaan Teknologi Nusa', 'KTA Kilat', 'KEP-82/D.05/2019', '30 September 2019', 'Konvensional', 'https://www.pendanaan.com/', 'Android & iOS'],
            [8, 'PT Kredit Pintar Indonesia', 'Kredit Pintar', 'KEP-83/D.05/2019', '30 September 2019', 'Konvensional', 'https://www.kreditpintar.com/', 'Android'],
            [9, 'PT Oriente Mas Sejahtera', 'Finmas', 'KEP-85/D.05/2019', '30 September 2019', 'Konvensional', 'www.finmas.co.id', 'Android'],
            [10, 'PT Aman Cermat Cepat', 'KlikA2C', 'KEP-87/D.05/2019', '30 September 2019', 'Konvensional', 'https://klika2c.co.id', 'Android'],
            [11, 'PT Akseleran Keuangan Inklusif Indonesia', 'Akseleran', 'KEP-122/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://www.akseleran.co.id/', 'Android'],
            [12, 'PT Ammana Fintek Syariah', 'Ammana', 'KEP-123/D.05/2019', '13 Desember 2019', 'Syariah', 'https://ammana.id/', 'Android & iOS'],
            [13, 'PT Dana Pinjaman Inklusif', 'PinjamanGo', 'KEP-124/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://pinjamango.co.id', 'Android & iOS'],
            [14, 'PT Lunaria Annua Teknologi', 'KoinP2P', 'KEP-125/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://koinp2p.com/', '-'],
            [15, 'PT Pohon Dana Indonesia', 'Pohondana', 'KEP-126/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://pohondana.id/', '-'],
            [16, 'PT Mekar InvestamaTeknologi', 'Mekar', 'KEP-127/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://mekar.id', '-'],
            [17, 'PT Pembiayaan Digital Indonesia', 'AdaKami', 'KEP-128/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://www.adakami.id/', 'Android & iOS'],
            [18, 'PT Esta Kapital Fintek', 'Esta Kapital', 'KEP-129/D.05/2019', '13 Desember 2019', 'Konvensional', 'www.estakapital.co.id', '-'],
            [19, 'PT Tri Digi Fin', 'KreditPro', 'KEP-130/D.05/2019', '13 Desember 2019', 'Konvensional', 'www.kreditpro.id', '-'],
            [20, 'PT Fintegra Homido Indonesia', 'FINTAG', 'KEP-131/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://fintag.id', '-'],
            [21, 'PT Kredit Utama Fintech Indonesia', 'RupiahCepat', 'KEP-132/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://www.rupiahcepat.co.id/', 'Android'],
            [22, 'PT Mediator Komunitas Indonesia', 'Crowdo', 'KEP-133/D.05/2019', '13 Desember 2019', 'Konvensional', 'https://crowdo.co.id/', 'Android'],
            [23, 'PT Artha Dana Teknologi', 'Indodana', 'KEP-15/D.05/2020', '19 Mei 2020', 'Konvensional', 'https://www.indodana.id', 'Android & iOS'],
            [24, 'PT JULO Teknologi Finansial', 'JULO', 'KEP-16/D.05/2020', '19 Mei 2020', 'Konvensional', 'https://www.julo.co.id/', 'Android'],
            [25, 'PT Progo Puncak Group', 'Pinjamin', 'KEP-17/D.05/2020', '19 Mei 2020', 'Konvensional', 'https://pinjamwinwin.com/', 'Android & iOS'],
            [26, 'PT Pindar Berbagi Bersama', 'DanaKredi', 'KEP-18/D.05/2020', '19 Mei 2020', 'Konvensional', 'https://www.danakredi.com/', 'Android & iOS'],
            [27, 'PT Indonusa Bara Sejahtera', 'OVO Finansial', 'KEP-19/D.05/2020', '19 Mei 2020', 'Konvensional', 'https://ovofinansial.com', '-'],
            [28, 'PT Finansial Integrasi Teknologi', 'PinjamModal', 'KEP-20/D.05/2020', '19 Mei 2020', 'Konvensional', 'https://pinjammodal.id/', 'Android & iOS'],
            [29, 'PT Alami Fintek Sharia', 'Alami', 'KEP-21/D.05/2020', '27 Mei 2020', 'Syariah', 'https://alamisharia.co.id/', 'Android & iOS'],
            [30, 'PT Simplefi Teknologi Indonesia', 'AwanTunai', 'KEP-22/D.05/2020', '27 Mei 2020', 'Konvensional', 'https://awantunai.co.id/', 'Android'],
            [31, 'PT Dana Kini Indonesia', 'Danakini', 'KEP-46/D.05/2020', '16 Oktober 2020', 'Konvensional', 'www.danakini.co.id', 'Android & iOS'],
            [32, 'PT Abadi Sejahtera Finansindo', 'Singa', 'KEP-47/D.05/2020', '16 Oktober 2020', 'Konvensional', 'https://singa.id/', 'Android'],
            [33, 'PT Intekno Raya', 'Danamerdeka', 'KEP-48/D.05/2020', '16 Oktober 2020', 'Konvensional', 'https://danamerdeka.co.id', '-'],
            [34, 'PT Indonesia Fintopia Technology', 'Easycash', 'KEP-49/D.05/2020', '16 Oktober 2020', 'Konvensional', 'https://www.easycash.id/', 'Android & iOS'],
            [35, 'PT Kuaikuai Tech Indonesia', 'Pinjamyuk', 'KEP-2/D.05/2021', '06 Januari 2021', 'Konvensional', 'https://www.pinjamyuk.co.id/', 'Android'],
            [36, 'PT Rezeki Bersama Teknologi', 'Finplus', 'KEP-3/D.05/2021', '06 Januari 2021', 'Konvensional', 'https://finplus.co.id/', '-'],
            [37, 'PT Uangme Fintek Indonesia', 'Uangme', 'KEP-4/D.05/2021', '06 Januari 2021', 'Konvensional', 'https://www.uangme.id/', 'Android & iOS'],
            [38, 'PT Stanford Teknologi Indonesia', 'PinjamDuit', 'KEP-5/D.05/2021', '06 Januari 2021', 'Konvensional', 'https://pinjamduit.co.id/', 'Android & iOS'],
            [39, 'PT Dana Syariah Indonesia', 'DANA SYARIAH', 'KEP-10/D.05/2021', '23 Februari 2021', 'Syariah', 'http://danasyariah.id', 'Android'],
            [40, 'PT Berdayakan Usaha Indonesia', 'BATUMBU', 'KEP-11/D.05/2021', '23 Februari 2021', 'Konvensional', 'www.batumbu.id', '-'],
            [41, 'PT Artha Permata Makmur', 'Cashcepat', 'KEP-12/D.05/2021', '23 Februari 2021', 'Konvensional', 'http://cashcepat.id', 'Android'],
            [42, 'PT Pinjaman Kemakmuran Rakyat', 'klikUMKM', 'KEP-13/D.05/2021', '23 Februari 2021', 'Konvensional', 'www.klikUMKM.co.id', '-'],
            [43, 'PT Kredit Plus Teknologi', 'Pinjam Gampang', 'KEP-16/D.05/2021', '16 Maret 2021', 'Konvensional', 'http://www.kreditplusteknologi.id', 'Android'],
            [44, 'PT Cicil Solusi Mitra Teknologi', 'cicil', 'KEP-20/D.05/2021', '14 April 2021', 'Konvensional', 'https://www.cicil.co.id', 'Android'],
            [45, 'PT Lumbung Dana Indonesia', 'lumbungdana', 'KEP-21/D.05/2021', '14 April 2021', 'Konvensional', 'http://lumbungdana.co.id', 'Android & iOS'],
            [46, 'PT Inovasi Terdepan Nusantara', 'KrediOne', 'KEP-22/D.05/2021', '14 April 2021', 'Konvensional', 'www.360kredi.id', 'Android'],
            [47, 'PT Kreditku Teknologi Indonesia', 'Kredinesia', 'KEP-25/D.05/2021', '21 April 2021', 'Konvensional', 'www.kredinesia.id', 'Android & iOS'],
            [48, 'PT Pinduit Teknologi Indonesia', 'Pintek', 'KEP-26/D.05/2021', '21 April 2021', 'Konvensional', 'http://pintek.id', '-'],
            [49, 'PT Modal Rakyat Indonesia', 'ModalRakyat', 'KEP-27/D.05/2021', '21 April 2021', 'Konvensional', 'http://modalrakyat.id', 'Android & iOS'],
            [50, 'PT Anugerah Digital Indonesia', 'SOLUSIKU', 'KEP-28/D.05/2021', '21 April 2021', 'Konvensional', 'www.solusi-ku.id', 'Android & iOS'],
            [51, 'PT Idana Solusi Sejahtera', 'Cairin', 'KEP-29/D.05/2021', '21 April 2021', 'Konvensional', 'www.cairin.id', 'Android & iOS'],
            [52, 'PT Trust Teknologi Finansial', 'Danaku', 'KEP-30/D.05/2021', '21 April 2021', 'Konvensional', 'http://danaku.id', 'Android & iOS'],
            [53, 'PT Harapan Fintech Indonesia', 'KLIK KAMI', 'KEP-31/D.05/2021', '21 April 2021', 'Konvensional', 'www.klikkami.co.id', 'Android & iOS'],
            [54, 'PT Duha Madani Syariah', 'Duha SYARIAH', 'KEP-32/D.05/2021', '21 April 2021', 'Syariah', 'www.duhasyariah.com', 'Android'],
            [55, 'PT Sol Mitra Fintec', 'Invoila', 'KEP-39/D.05/2021', '11 Mei 2021', 'Konvensional', 'http://invoila.co.id', 'Android'],
            [56, 'PT Satustop Finansial Solusi', 'Sanders One Stop Solution', 'KEP-40/D.05/2021', '11 Mei 2021', 'Konvensional', 'http://sanders.co.id', '-'],
            [57, 'PT Dana Bagus Indonesia', 'DanaBagus', 'KEP-41/D.05/2021', '11 Mei 2021', 'Konvensional', 'www.danabagus.id', 'Android'],
            [58, 'PT Teknologi Merlin Sejahtera', 'UKU', 'KEP-46/D.05/2021', '2 Juni 2021', 'Konvensional', 'ukuindo.com', 'Android'],
            [59, 'PT Fintek Digital Indonesia', 'KREDITO', 'KEP-47/D.05/2021', '2 Juni 2021', 'Konvensional', 'https://kredito.id', 'Android & iOS'],
            [60, 'PT Info Tekno Siaga', 'AdaPundi', 'KEP-48/D.05/2021', '2 Juni 2021', 'Konvensional', 'www.adapundi.com', 'Android & iOS'],
            [61, 'PT Lentera Dana Nusantara', 'Lentera Dana Nusantara', 'KEP-49/D.05/2021', '2 Juni 2021', 'Konvensional', 'www.lenteradana.co.id/lender/', 'Android'],
            [62, 'PT Solusi Teknologi Finansial', 'Modal Nasional', 'KEP-50/D.05/2021', '2 Juni 2021', 'Konvensional', 'www.modalnasional.co.id', 'Android & iOS'],
            [63, 'PT Komunal Finansial Indonesia', 'Komunal', 'KEP-51/D.05/2021', '2 Juni 2021', 'Konvensional', 'www.komunal.co.id', 'Android & iOS'],
            [64, 'PT Cerita Teknologi Indonesia', 'Restock.ID', 'KEP-52/D.05/2021', '2 Juni 2021', 'Konvensional', 'www.restock.id', '-'],
            [65, 'PT Grha Dana Bersama', 'Avantee', 'KEP-66/D.05/2021', '2 Agustus 2021', 'Konvensional', 'www.avantee.co.id', '-'],
            [66, 'PT Gradana Teknoruci Indonesia', 'Gradana', 'KEP-67/D.05/2021', '2 Agustus 2021', 'Konvensional', 'gradana.co.id', '-'],
            [67, 'PT Inclusive Finance Group', 'Danacita', 'KEP-68/D.05/2021', '2 Agustus 2021', 'Konvensional', 'www.danacita.co.id', '-'],
            [68, 'PT IKI Karunia Indonesia', 'Pijar', 'KEP-69/D.05/2021', '2 Agustus 2021', 'Konvensional', 'www.pijar.com', '-'],
            [69, 'PT Finansia Aira Teknologi', 'Ivoji', 'KEP-73/D.05/2021', '19 Agustus 2021', 'Konvensional', 'www.ivoji.id', 'Android & iOS'],
            [70, 'PT Bursa Akselerasi Indonesia', 'Indofund.id', 'KEP-74/D.05/2021', '19 Agustus 2021', 'Konvensional', 'indofund.id', '-'],
            [71, 'PT LinkAja Modalin Nusantara', 'iGrow', 'KEP-75/D.05/2021', '19 Agustus 2021', 'Konvensional', 'igrow.asia', 'Android & iOS'],
            [72, 'PT Adiwisista Finansial Teknologi', 'Danai.id', 'KEP-76/D.05/2021', '19 Agustus 2021', 'Konvensional', 'http://danai.id', 'Android & iOS'],
            [73, 'PT Fidac Inovasi Teknologi', 'DUMI', 'KEP-78/D.05/2021', '24 Agustus 2021', 'Konvensional', 'minjem.com', 'Android & iOS'],
            [74, 'PT Lampung Berkah Finansial Teknologi', 'LAHAN SIKAM', 'KEP-79/D.05/2021', '24 Agustus 2021', 'Konvensional', 'www.lahansikam.co.id', '-'],
            [75, 'PT Qazwa Mitra Hasanah', 'qazwa.id', 'KEP-80/D.05/2021', '24 Agustus 2021', 'Syariah', 'qazwa.id', '-'],
            [76, 'PT KrediFazz Digital Indonesia', 'KrediFazz', 'KEP-81/D.05/2021', '24 Agustus 2021', 'Konvensional', 'www.kredifazz.id', 'Android'],
            [77, 'PT Doeku Peduli Indonesia', 'KreditOK', 'KEP-82/D.05/2021', '24 Agustus 2021', 'Konvensional', 'kreditok.id', 'Android'],
            [78, 'PT Aktivaku Investama Teknologi', 'Aktivaku', 'KEP-83/D.05/2021', '24 Agustus 2021', 'Konvensional', 'aktivaku.com', '-'],
            [79, 'PT Mulia Inovasi Digital', 'Danain', 'KEP-84/D.05/2021', '24 Agustus 2021', 'Konvensional', 'www.danain.co.id', 'Android & iOS'],
            [80, 'PT Indosaku Digital Teknologi', 'Indosaku', 'KEP-86/D.05/2021', '31 Agustus 2021', 'Konvensional', 'indosaku.id', 'Android'],
            [81, 'PT Fintech Bina Bangsa', 'EDUFUND', 'KEP-88/D.05/2021', '8 September 2021', 'Konvensional', 'www.edufund.co.id', 'Android & iOS'],
            [82, 'PT Kreasi Anak Indonesia', 'GandengTangan', 'KEP-89/D.05/2021', '8 September 2021', 'Konvensional', 'www.gandengtangan.co.id', 'Android'],
            [83, 'PT Piranti Alphabet Perkasa', 'PAPITUPI SYARIAH', 'KEP-90/D.05/2021', '8 September 2021', 'Syariah', 'www.papitupisyariah.com', 'Android'],
            [84, 'PT Smartec Teknologi Indonesia', 'BantuSaku', 'KEP-91/D.05/2021', '8 September 2021', 'Konvensional', 'bantusaku.id', 'Android'],
            [85, 'PT Digital Micro Indonesia', 'danabijak', 'KEP-92/D.05/2021', '8 September 2021', 'Konvensional', 'danabijak.com', 'Android'],
            [86, 'PT Solid Fintek Indonesia', 'AdaModal', 'KEP-94/D.05/2021', '8 September 2021', 'Konvensional', 'www.adamodal.co.id', 'Android & iOS'],
            [87, 'PT Sejahtera Sama Kita', 'SamaKita', 'KEP-95/D.05/2021', '8 September 2021', 'Konvensional', 'samakita.co.id', '-'],
            [88, 'PT Kawan Cicil Teknologi Utama', 'KawanCicil', 'KEP-101/D.05/2021', '17 September 2021', 'Konvensional', 'kawancicil.co.id', 'Android & iOS'],
            [89, 'PT Klikcair Magga Jaya', 'KlikCair', 'KEP-103/D.05/2021', '17 September 2021', 'Konvensional', 'klikcair.com', 'Android'],
            [90, 'PT Ethis Fintek Indonesia', 'ETHIS', 'KEP-104/D.05/2021', '17 September 2021', 'Syariah', 'ethis.co.id', '-'],
            [91, 'PT Sahabat Mikro Fintek', 'SAMIR', 'KEP-105/D.05/2021', '17 September 2021', 'Konvensional', 'www.samir.co.id', 'Android & iOS'],
            [92, 'PT Plus Ultra Abadi', 'UATAS', 'KEP-106/D.05/2021', '17 September 2021', 'Konvensional', 'www.uatas.id', 'Android'],
            [93, 'PT Pintar Inovasi Digital', 'Asetku', 'KEP-123/D.05/2021', '23 Desember 2021', 'Konvensional', 'www.asetku.co.id', 'Android & iOS'],
            [94, 'PT Mapan Global Reksa', 'Findaya', 'KEP-124/D.05/2021', '23 Desember 2021', 'Konvensional', 'https://www.findaya.co.id', 'Android & iOS'],
        ];

        foreach ($data as $item) {
            DB::table('legal_pinjols')->insert([
                'company_name' => $item[1],
                'app_name' => $item[2],
                'license_number' => $item[3],
                'license_date' => $this->parseIndoDate($item[4]),
                'business_type' => $item[5],
                'website' => $item[6],
                'os' => $item[7],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function parseIndoDate($dateString)
    {
        $months = [
            'Januari' => '01', 'Februari' => '02', 'Maret' => '03', 'April' => '04',
            'Mei' => '05', 'Juni' => '06', 'Juli' => '07', 'Agustus' => '08',
            'September' => '09', 'Oktober' => '10', 'November' => '11', 'Desember' => '12'
        ];

        foreach ($months as $name => $num) {
            if (str_contains($dateString, $name)) {
                $dateString = str_replace($name, $num, $dateString);
                break;
            }
        }

        try {
            return Carbon::createFromFormat('d m Y', $dateString)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
