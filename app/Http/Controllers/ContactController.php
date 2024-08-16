<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    // index
    public function index(Request $request)
    {
        // show all contacts
        $allContacts    =   Contact::all();
        return view('index', compact('allContacts'));
    }


    // search contacts
    public function search(Request $request)
    {
        $search         =   $request->input('search');

        $allContacts  =   DB::table('contacts')
            ->where('name', 'like', '%'. $search. '%')
            ->orwhere('email', 'like', '%'. $search. '%')
            ->get();

        return view('index', compact('allContacts'));
    }

    // sort contacts by name or date
    public function sort(Request $request)
    {
        $query     = Contact::query();
        $sortField = $request->input('sort_by', 'created_at'); // Default sort field
        $sortDirection = $request->input('sort_direction', 'desc'); // Default sort direction

        // Validate sort direction
        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'desc'; // Default to desc if invalid direction
        }

        // Apply sorting
        $query->orderBy($sortField, $sortDirection);

        // Paginate results
        $allContacts = $query->paginate(10);
        return view('index', compact('allContacts'));

    }



    // create contact
    public function create()
    {
        return view('create');
    }

    // store new contact
    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('index.contact');
    }

    // show single contact
    public function view($id)
    {
        $contact    =   Contact::find($id);
        return view('show', compact('contact'));
    }

    // edit contact
    public function edit($id)
    {
        $contactEdit    =   Contact::find($id);
        return view('edit', compact('contactEdit'));
    }


    // update contact
    public function update(Request $request, $id)
    {
        $contactUpdate  =   Contact::find($id);
        $contactUpdate->update($request->all());

        return redirect()->route('index.contact');
    }

    // delete contact
    public function destroy($id)
    {
        $contactDelete  =   Contact::find($id);
        $contactDelete->delete();
        return back();
    }

}
