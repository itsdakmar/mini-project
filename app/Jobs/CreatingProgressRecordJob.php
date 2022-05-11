<?php

namespace App\Jobs;

use App\Models\ProgressProductUpload;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatingProgressRecordJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $originalFileName;
    public $busId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($busId, $originalFileName)
    {
        $this->busId = $busId;
        $this->originalFileName = $originalFileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ProgressProductUpload::create([
            'file_name' => $this->originalFileName,
            'bus_id' => $this->busId,
            'status' => ProgressProductUpload::PENDING
        ]);
    }
}
