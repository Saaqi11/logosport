<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkParticipants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DesignerWorkController extends Controller
{
    public function myAllWorks (): View
    {
        $works = WorkParticipants::with("contest")
            ->where("designer_user_id", Auth::id())
            ->paginate(10);
        return view("user.cabinet.all-works", compact("works"));
    }
}
