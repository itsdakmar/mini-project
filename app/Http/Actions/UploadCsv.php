<?php

namespace App\Http\Actions;

use App\Models\ProgressProductUpload;
use Illuminate\Http\Request;

class UploadCsv
{

    public function handle(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv',
        ]);

        $file = $request->file('file');

        ChunkCsv::handle(file($file));
        UpsertProductsWithJob::handle($file->getClientOriginalName());

        return back()->with('status', 'ok');
    }
}
