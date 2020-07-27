<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Exception;

trait HandlesFile
{
    function upload($content, $filename, $disk)
    {
        try {
            if (!Storage::disk($disk)->put($filename, $content)) {
                throw new Exception("Error Processing Request", 1);
            }
        } catch (Exception $e) {
            $error = $e->getMessage();

            Session::flash('errors', $error);
            return false;
        }
        return true;
    }

    public function getFile($disk, $filename)
    {
        return Storage::disk($disk)->get($filename);
    }
}
