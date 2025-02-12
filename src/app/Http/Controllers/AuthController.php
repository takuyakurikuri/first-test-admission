<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AuthController extends Controller
{
    public function admin(){
        $contacts = Contact::with('category')->get();
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        return view('admin',compact('contacts','categories'));
    }
}