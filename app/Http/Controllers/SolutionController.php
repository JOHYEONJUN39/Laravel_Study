<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormService;
use Illuminate\Support\Facades\Auth;

class SolutionController extends Controller
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
        $query->where('solution', 1);
        $query->orderBy('created_at', 'desc');

        $contacts = $query->select('id', 'name', 'title', 'created_at', 'solutionist')
        ->paginate(20);


        return view('solution.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $contact = ContactForm::find($id);
        $gender = CheckFormService::checkGender($contact);
        $age = CheckFormService::checkAge($contact);
        

        return view('solution.create',
        compact('contact', 'gender', 'age'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $contact = ContactForm::find($request->id);
        $contact->solutionContact = $request->solutionContact;
        $contact->solutionist = Auth::user()->name;
        $contact->solution = 1;
        $contact->save();

        return to_route('solution.index');
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

        return view('solution.show',
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

    }
}
