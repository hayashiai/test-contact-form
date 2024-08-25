<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'LIKE', "%{$request->keyword}%")
                  ->orWhere('email', 'LIKE', "%{$request->keyword}%");
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);

        return view('admin', compact('contacts'));
    }

    public function detail($id)
    {
        $contact = Contact::findOrFail($id);
        return view('detail', compact('contact'));
    }
}
