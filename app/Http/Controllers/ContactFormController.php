<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormService;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        
        $search = $request->search;
        $query = ContactForm::search($search);
        $query->where('solution', 0);
        // contacts가 desc로 정렬
        $query->orderBy('created_at', 'desc');

        $contacts = $query->select('id', 'name', 'title', 'created_at')
        ->paginate(20);
        
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        ContactForm::create([
            'name' => Auth::user()->name,
            'title' => $request->title,
            'email' => Auth::user()->email,
            'language' => $request->language,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
            'solution' => 0,
            'solutionist' => '',
        ]);
        return to_route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactForm::find($id);
        $gender = CheckFormService::checkGender($contact);
        $age = CheckFormService::checkAge($contact);

        return view('contacts.show',
        compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactForm::find($id);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = ContactForm::find($id);
        // Form에 들어있는 정보를 DB에 업데이트 (덮어쓰기)
        $contact->title = $request->title;
        $contact->language = $request->language;
        $contact->url = $request->url;
        $contact->gender = $request->gender;
        $contact->age = $request->age;
        $contact->contact = $request->contact;
        $contact->save();

        return to_route('contacts.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $contact = ContactForm::find($id);
        $contact->delete();

        return to_route('contacts.index');
    }
}
