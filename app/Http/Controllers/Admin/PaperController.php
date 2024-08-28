<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function Index(){
        $papers = paper::latest()->get();
      return view('admin.basvuru', compact('papers'));
    }
}
