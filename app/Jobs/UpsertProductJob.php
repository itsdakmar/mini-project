<?php

namespace App\Jobs;

use App\Http\Actions\ClearEncodingStr;
use App\Models\Product;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpsertProductJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $records;
    public $header;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($records, $header)
    {
        $this->records = $records;
        $this->header  = $header;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->records as $record) {
            // Decode unwanted html entities
            $record = array_map("html_entity_decode", $record);

            // Set the field name as key
            $record = array_combine($this->header, $record);

            // Get the clean data
            $record = ClearEncodingStr::handle($record);

            DB::table('products')->upsert($record, ['unique_key']);
        }
    }
}
