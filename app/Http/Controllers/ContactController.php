<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->get('sort', 'name');
        $sortOrder = $request->get('order', 'asc');
        $search = $request->get('search');

        $contacts = Contact::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%")
                             ->orWhere('email', 'like', "%$search%");
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(10);

        return view('contacts.index', compact('contacts', 'sortField', 'sortOrder'));
    }
    public function create(){
        return view('contacts.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',

        ],[
            'name' => 'Please Enter Your Name',
            'email' => 'Pleace Enter Your Email',
            'phone' => 'Pleace Enter Your Phone Number',
            'address' => 'Pleace Enter Your Address',
        ]);
        Contact::create($request->all());
        return redirect('contacts')->with('status','Created Susscssfully');
    }
    public function show($id){
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }
    public function edit($id){
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }
    public function update(Request $request, $id){
        $contact = Contact::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',

        ],[
            'name' => 'Please Enter Your Name',
            'email' => 'Pleace Enter Your Email',
            'phone' => 'Pleace Enter Your Phone Number',
            'address' => 'Pleace Enter Your Address',
        ]);
        $contact->updated($request->all());
        return redirect('contacts')->with('status','Updated Susscssfully');
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index');
    }
}

