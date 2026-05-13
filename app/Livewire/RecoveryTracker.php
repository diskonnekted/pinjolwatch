<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RecoveryStage;
use App\Models\UserRecoveryProgress;
use Illuminate\Support\Facades\Auth;

class RecoveryTracker extends Component
{
    public $stages;
    public $userProgress = [];
    public $currentStageIndex = 0;
    public $selectedMood = null;
    public $note = '';

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->stages = RecoveryStage::orderBy('order')->get();
        $this->userProgress = UserRecoveryProgress::where('user_id', Auth::id())
            ->pluck('completed_at', 'recovery_stage_id')
            ->toArray();
        
        // Find the first incomplete stage
        foreach ($this->stages as $index => $stage) {
            if (!isset($this->userProgress[$stage->id])) {
                $this->currentStageIndex = $index;
                break;
            }
        }
    }

    public function completeStage($stageId)
    {
        UserRecoveryProgress::updateOrCreate(
            ['user_id' => Auth::id(), 'recovery_stage_id' => $stageId],
            [
                'completed_at' => now(),
                'mood_rating' => $this->selectedMood,
                'user_notes' => $this->note
            ]
        );

        $this->reset(['selectedMood', 'note']);
        $this->loadData();
        $this->dispatch('stage-completed');
    }

    public function render()
    {
        return view('livewire.recovery-tracker');
    }
}
