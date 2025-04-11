<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Imagick;

// class ConverterController extends Controller
// {
//     // Show the upload form
//     public function index()
//     {
//         return view('converter');
//     }

//     // Handle the conversion
//     public function convert(Request $request)
//     {
//         // Validate the file
//         $request->validate([
//             'heic_file' => 'required|file|mimes:heic,heif|max:10240', // Max 10MB
//         ]);

//         try {
//             // Get the uploaded file
//             $file = $request->file('heic_file');
//             $inputPath = $file->getRealPath();

//             // Define output path
//             $outputFileName = 'converted_' . time() . '.jpg';
//             $outputPath = public_path('converted/' . $outputFileName);

//             // Create 'converted' directory if it doesn’t exist
//             if (!file_exists(public_path('converted'))) {
//                 mkdir(public_path('converted'), 0755, true);
//             }

//             // Convert HEIC to JPG
//             $image = new Imagick($inputPath);
//             $image->setImageFormat('jpg');
//             $image->setImageCompressionQuality(90); // Quality: 0-100
//             $image->writeImage($outputPath);
//             $image->destroy();

//             // Return the converted file
//             return response()->download($outputPath)->deleteFileAfterSend(true);
//         } catch (\Exception $e) {
//             return redirect()->back()->with('error', 'Conversion failed: ' . $e->getMessage());
//         }
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;

class ConverterController extends Controller
{
    // Show the upload form
    public function index()
    {
        return view('converter');
    }

    // Handle the conversion and optimization
    public function convert(Request $request)
    {
        // Validate the file
        $request->validate([
            'heic_file' => 'required|file|mimes:heic,heif|max:10240', // Max 10MB
        ]);

        try {
            // Get the uploaded file
            $file = $request->file('heic_file');
            $inputPath = $file->getRealPath();

            // Define output path
            $outputFileName = 'converted_' . time() . '.jpg';
            $outputPath = public_path('converted/' . $outputFileName);

            // Create 'converted' directory if it doesn’t exist
            if (!file_exists(public_path('converted'))) {
                mkdir(public_path('converted'), 0755, true);
            }

            // Load the image with Imagick
            $image = new Imagick($inputPath);

            // Optimize: Resize if too large (e.g., max width 1920px)
            $maxWidth = 1920; // Adjust as needed
            if ($image->getImageWidth() > $maxWidth) {
                $image->resizeImage($maxWidth, 0, Imagick::FILTER_LANCZOS, 1);
            }

            // Set format to JPG
            $image->setImageFormat('jpg');

            // Optimize: Compress and set quality (0-100, lower = smaller size)
            $image->setImageCompression(Imagick::COMPRESSION_JPEG);
            $image->setImageCompressionQuality(75); // 75 is a good balance; adjust as needed

            // Optional: Strip metadata to further reduce size
            $image->stripImage();

            // Write the optimized image
            $image->writeImage($outputPath);
            $image->destroy();

            // Return the file for download
            return response()->download($outputPath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Conversion failed: ' . $e->getMessage());
        }
    }
}
