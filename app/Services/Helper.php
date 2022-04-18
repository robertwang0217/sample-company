<?php

namespace App\Services;

class Helper
{
    public function saveFileToStorage(\Illuminate\Http\UploadedFile $file) {

        $fileName = $file->getClientOriginalName();

        $file->storeAs('public', $fileName);

        $relativeUrl = '/storage/'.$fileName;

        return $relativeUrl;
    }
}
