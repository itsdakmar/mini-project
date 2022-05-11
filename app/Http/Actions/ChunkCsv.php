<?php

namespace App\Http\Actions;

class ChunkCsv
{
    public static function handle($data)
    {
        //chunk csv into 3000 rows each
        $chunks = array_chunk($data, 3000);

        //put chunked data into a csv
        foreach ($chunks as $key => $chunk){
            $path = \Storage::disk('temp')->path("products-of-{$key}.csv");
            file_put_contents($path, $chunk);
        }
    }
}
