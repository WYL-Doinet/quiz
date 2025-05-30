<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AppController extends Controller
{
    public function index()
    {

        return Inertia::render('App/Index');
    }

    public function download()
    {
        return response()->streamDownload(function () {

            $filePath = Storage::disk('apk')->path('bb.exe');

        
            $fileHandle = fopen($filePath, 'rb');

      
            if ($fileHandle === false) {
       
                error_log("Failed to open file: " . $filePath);
                return;
            }

  
            try {
                while (!feof($fileHandle)) {
                
                    echo fread($fileHandle, 1024 * 8); 
                    if (ob_get_level() > 0) {
                        ob_flush();
                    }
                    flush();

                }
            } finally {
                fclose($fileHandle);
            }
        }, 'bb.exe', [ 
            'Content-Type' => 'application/octet-stream', 
        ]);
    }
}
