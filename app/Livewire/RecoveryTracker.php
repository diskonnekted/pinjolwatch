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
    public $currentStageTasks = [];
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
                
                // Load current stage tasks progress if any
                $progress = UserRecoveryProgress::where('user_id', Auth::id())
                    ->where('recovery_stage_id', $stage->id)
                    ->first();
                
                if ($progress && $progress->completed_tasks) {
                    $this->currentStageTasks = $progress->completed_tasks;
                } else {
                    $this->currentStageTasks = [];
                }
                break;
            }
        }
    }

    public function toggleTask($task)
    {
        if (in_array($task, $this->currentStageTasks)) {
            $this->currentStageTasks = array_diff($this->currentStageTasks, [$task]);
        } else {
            $this->currentStageTasks[] = $task;
        }

        // Save progress partially even if stage not complete
        UserRecoveryProgress::updateOrCreate(
            ['user_id' => Auth::id(), 'recovery_stage_id' => $this->stages[$this->currentStageIndex]->id],
            ['completed_tasks' => $this->currentStageTasks]
        );
    }

    public function completeStage($stageId)
    {
        UserRecoveryProgress::updateOrCreate(
            ['user_id' => Auth::id(), 'recovery_stage_id' => $stageId],
            [
                'completed_at' => now(),
                'mood_rating' => $this->selectedMood,
                'user_notes' => $this->note,
                'completed_tasks' => $this->stages[$this->currentStageIndex]->tasks // Mark all tasks as done
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
