<?php

namespace App\Http\Livewire;

use App\Models\ProgressProductUpload;
use Livewire\Component;

class ProgressBar extends Component
{
    public $busId;
    public $stopPolling = false;

    public function mount($busId)
    {
        $this->busId = $busId;
    }

    public function getPercentageProperty()
    {
        $bus = \Bus::findBatch($this->busId);
        if ($bus->finished()) $this->stopPolling = true;
        if ($bus->progress() !== 0 && ! $bus->finished()) $this->progress->update(['status' => ProgressProductUpload::PROCESSING]);
        if ($bus->hasFailures()) $this->progress->update(['status' => ProgressProductUpload::FAILED]);

        return $bus->progress().'%';
    }

    public function getProgressProperty()
    {
        return ProgressProductUpload::query()->whereBusId($this->busId)->first();
    }

    public function getStatusForHumanProperty()
    {
        return [
            0 => 'Pending',
            1 => 'In-Progress',
            2 => 'Failed',
            3 => 'Success'
        ][$this->progress->status];
    }

    public function render()
    {
        return view('livewire.progress-bar');
    }
}
