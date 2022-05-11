<?php

namespace App\Http\Actions;

use App\Jobs\CreatingProgressRecordJob;
use App\Jobs\UpsertProductJob;
use App\Models\ProgressProductUpload;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;

class UpsertProductsWithJob
{

    public static function handle($originalFileName)
    {
        $path = Storage::disk('temp')->path('*.csv');
        $files = glob($path);
        $header = [];

        $batch = Bus::batch([])->then(function (Batch $batch) use ($originalFileName) {
            ProgressProductUpload::query()
                ->whereBusId($batch->id)
                ->first()
                ->update([
                'status' => ProgressProductUpload::COMPLETED
            ]);
        })->dispatch();

        $batch->add(new CreatingProgressRecordJob($batch->id, $originalFileName));

        foreach ($files as $key => $file) {
            $records = array_map('str_getcsv', file($file));

            // The header will be stored in a variable and removed from the array.
            if ($key === 0) {
                $header = array_map('strtolower', $records[0]);
                array_shift($records);
            }

            $batch->add(new UpsertProductJob($records, $header));
        }

        return $batch;
    }
}
