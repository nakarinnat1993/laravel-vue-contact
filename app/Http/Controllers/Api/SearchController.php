<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class SearchController extends Controller
{
    public function index(Request $request){
        $data = $request->validate([
            'searchTerm' => 'required'
        ]);
        $contacts = Contact::search($request->searchTerm)->get();

        return response()->json($contacts);
    }
}
