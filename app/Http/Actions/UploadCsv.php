<?php

namespace App\Http\Actions;

use App\Jobs\UpsertProductJob;
use App\Models\Product;
use Illuminate\Http\Request;

class UploadCsv
{
    private $rows = [];

    public function handle(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        $records = array_map('str_getcsv', file($path));

        if (! count($records) > 0) {
            return 'No records found on your uploaded csv.';
        }

        // Get field names from header column
        $fields = array_map('strtolower', $records[0]);

        // Remove the header column
        array_shift($records);

        foreach ($records as $record) {
            if (count($fields) != count($record)) {
                return 'csv_upload_invalid_data';
            }

            // Decode unwanted html entities
            $record =  array_map("html_entity_decode", $record);

            // Set the field name as key
            $record = array_combine($fields, $record);

            // Get the clean data
            $this->rows[] = ClearEncodingStr::handle($record);
        }

        $now = now();

        collect($this->rows)->each(function (array $chunkedData) use ($now) {
            UpsertProductJob::dispatch($chunkedData)->delay($now->addSeconds(20));
        });

        return back()->with('status', 'ok');
    }
}
