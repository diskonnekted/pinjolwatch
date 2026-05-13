<?php

namespace App\Livewire;

use Livewire\Component;

class MentalHealthQuiz extends Component
{
    public $step = 0; // 0: intro, 1-10: questions, 11: result
    public $answers = [];
    public $totalScore = 0;
    public $resultLevel = '';
    public $resultAdvice = '';

    // Standard K10 (Kessler Psychological Distress Scale) questions adapted
    protected $questions = [
        1 => "Seberapa sering Anda merasa lelah tanpa alasan yang jelas akibat memikirkan tagihan?",
        2 => "Seberapa sering Anda merasa sangat gugup/cemas saat melihat notifikasi HP?",
        3 => "Seberapa sering Anda merasa begitu gugup sehingga tidak ada yang bisa menenangkan Anda?",
        4 => "Seberapa sering Anda merasa putus asa?",
        5 => "Seberapa sering Anda merasa gelisah atau tidak tenang?",
        6 => "Seberapa sering Anda merasa begitu gelisah sehingga Anda tidak bisa duduk diam?",
        7 => "Seberapa sering Anda merasa depresi/sedih mendalam?",
        8 => "Seberapa sering Anda merasa bahwa segala sesuatu memerlukan usaha yang sangat berat?",
        9 => "Seberapa sering Anda merasa sangat sedih sehingga tidak ada yang bisa menghibur Anda?",
        10 => "Seberapa sering Anda merasa tidak berharga?",
    ];

    public function startQuiz()
    {
        $this->step = 1;
        $this->answers = [];
    }

    public function answer($score)
    {
        $this->answers[$this->step] = $score;
        
        if ($this->step < 10) {
            $this->step++;
        } else {
            $this->calculateResult();
        }
    }

    public function calculateResult()
    {
        $this->totalScore = array_sum($this->answers);
        
        // K10 Scoring standard
        if ($this->totalScore <= 19) {
            $this->resultLevel = 'Rendah (Normal)';
            $this->resultAdvice = 'Anda saat ini berada dalam kondisi mental yang cukup stabil. Tetap waspada dan jangan biarkan tekanan pinjol merusak ketenangan Anda. Terus gunakan PinjolWatch untuk memantau situasi secara logis.';
        } elseif ($this->totalScore <= 24) {
            $this->resultLevel = 'Sedang (Distres Ringan)';
            $this->resultAdvice = 'Anda mulai merasakan beban emosional. Cobalah untuk mulai membatasi interaksi dengan penagih yang kasar, berceritalah pada orang terpercaya, dan fokus pada solusi satu per satu. Anda tidak sendirian.';
        } elseif ($this->totalScore <= 29) {
            $this->resultLevel = 'Tinggi (Distres Psikologis)';
            $this->resultAdvice = 'Tekanan pinjol telah berdampak nyata pada kesejahteraan Anda. Kami sangat menyarankan Anda menghubungi layanan konseling atau LBH pendamping. Jangan menanggung beban ini sendirian, ada bantuan yang tersedia.';
        } else {
            $this->resultLevel = 'Sangat Tinggi (Butuh Bantuan Segera)';
            $this->resultAdvice = 'Kondisi Anda saat ini sangat mengkhawatirkan. Mohon segera hubungi tenaga profesional (psikolog/psikiater) atau hotline darurat kesehatan jiwa (119 ext 8). Nyawa dan ketenangan Anda jauh lebih berharga daripada hutang apa pun.';
        }

        // Save to Database for analytics
        \App\Models\MentalHealthTest::create([
            'user_id' => auth()->id(),
            'total_score' => $this->totalScore,
            'result_level' => $this->resultLevel,
            'responses' => $this->answers,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        
        $this->step = 11;
    }

    public function render()
    {
        return view('livewire.mental-health-quiz', [
            'currentQuestion' => $this->questions[$this->step] ?? '',
            'totalQuestions' => 10
        ]);
    }
}
