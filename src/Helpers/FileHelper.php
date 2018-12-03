<?php

namespace Jersak\Versioning;

use Illuminate\Support\Facades\Storage;
use Log;

class FileHelper
{
    public function getConfigFile()
    {
        try {
            $file = Storage::get('version.json');
        } catch (\Exception $e) {
            return null;
        }

        return json_decode($file, true);
    }

    public function getVersionFromFile($file)
    {
        if (isset($file['version'])) {
            return $file['version'];
        }

        return null;
    }
}
