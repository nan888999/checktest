<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel-1', 'tel-2', 'tel-3', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($contact['category_id']);
        return view('confirm', compact('contact','category'));
    }

    public function store(ContactRequest $request) {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel-1', 'tel-2', 'tel-3', 'address', 'building', 'category_id', 'detail']);
        $contact['tel'] = $contact['tel-1'] . $contact['tel-2'] . $contact['tel-3'];
        unset($contact['tel-1'], $contact['tel-2'], $contact['tel-3']);

        Contact::create($contact);
        return view('thanks');
    }

    public function back(ContactRequest $request)
    {
        return redirect('/')->withInput($request->all());
    }

    public function thanks()
    {
        return view('thanks');
    }
}