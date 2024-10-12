<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class LanguageManagementController extends Controller
{
    public function getAllLanguages()
    {
        $languages = DB::table('languages')->get();
        return response()->json($languages);
    }

    public function getJson(Request $request, $code, $file)
{
    // Construct the path to the specific JSON file
    $filePath = base_path("lang/$code/$file.json"); // Use base_path() for correct path

    // Log the path for debugging
    \Log::info('Checking file at path: ' . $filePath);

    // Check if the file exists
    if (File::exists($filePath)) {
        // Read the contents of the JSON file
        $jsonContent = File::get($filePath);
        return response()->json(json_decode($jsonContent), 200);
    }

    // Return an error if the file is not found
    return response()->json(['error' => 'Language file not found'], 404);
}   



    public function changeLanguage(Request $request)
    {
        $code = $request->code;

        if (is_dir(resource_path("lang/{$code}"))) {
            Cache::put('locale', $code);
            return response()->json(['message' => 'Language changed successfully']);
        }

        return response()->json(['error' => 'Invalid language code'], 400);
    }
}
