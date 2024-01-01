<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\SupportMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the form data, including file uploads
        $request->validate([
            'theme' => 'required|string',
            'message' => 'required|string',
        ]);

        $support = new Support();
        $support->theme = $request->theme;
        $support->message = $request->message;
        $support->save();

        $userAttachmentPublicPath = public_path("/support/" . $request->id . "/");

        //create dynamic directory
        if (!File::isDirectory($userAttachmentPublicPath)) {
            File::makeDirectory($userAttachmentPublicPath, 0755, true);
        }
        $uploadedFiles = $request->input('uploaded_files', []);

        // Handle file uploads
        $uploadedFileObjects = $request->file('file');

        if ($uploadedFileObjects && count($uploadedFiles) > 0) {
            foreach ($uploadedFileObjects as $uploadedFile) {
                // Check if the file is in the list of uploaded_files
                if (in_array($uploadedFile->getClientOriginalName(), $uploadedFiles)) {
                    
                    $file = Storage::disk('support_uploads')->put(Auth::id(), $uploadedFile);
                    $supportMedia = new SupportMedia();
                    $supportMedia->name = $uploadedFile->getClientOriginalName();
                    $supportMedia->path = $file;
                    $supportMedia->support_id = $support->id;
                    $supportMedia->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
