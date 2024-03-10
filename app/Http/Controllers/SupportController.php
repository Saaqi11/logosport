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
            'message' => 'required',
            'category' => 'required',
        ]);

        $support = new Support();
        $support->message = $request->message;
        $support->category = $request->category;
        $support->user_id = Auth::id();
        $support->save();

        $userAttachmentPublicPath = public_path("/support/" . $request->id . "/");

        //create dynamic directory
        if (!File::isDirectory($userAttachmentPublicPath)) {
            File::makeDirectory($userAttachmentPublicPath, 0755, true);
        }
        // Handle file uploads
        $uploadedFileObjects = $request->file('file');

        if ($uploadedFileObjects && count($uploadedFileObjects) > 0) {
            foreach ($uploadedFileObjects as $uploadedFile) {
            
                // Check if the file is in the list of uploaded_files
                    
                $file = Storage::disk('support_uploads')->put(Auth::id(), $uploadedFile);
                $supportMedia = new SupportMedia();
                $supportMedia->name = $uploadedFile->getClientOriginalName();
                $supportMedia->path = $file;
                $supportMedia->support_id = $support->id;
                $supportMedia->save();
            }
        }
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
