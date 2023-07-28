<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkParticipants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignerWorkController extends Controller
{
    public function myAllWorks () {
        $works = WorkParticipants::with("contest")
            ->where("designer_user_id", Auth::id())
            ->get();
        return view("user.cabinet.all-works", compact("works"));
    }
}
