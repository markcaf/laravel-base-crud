<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    
    protected $validationRules = [
        'title' => 'required|string|min:3|max:255|unique:comics,title',
        'description' => 'required|min:3|string',
        'thumb' => 'required|active_url',
        'price' => 'required|numeric',
        'series' => 'required|string|min:3|max:255',
        'sale_date' => 'required|date',
        'type' => 'required|exists:comics,type',
    ];

    protected $customValidationMessages = [
        'type.exists' => 'The selected type is not available between the current types of comics, choose from the select.',
    ];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comic = new Comic();
        return view('comics.create', compact('comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sentData = $request->all();

        $validatedData = $request -> validate($this->validationRules, $this->customValidationMessages);

        $comic = new Comic();
        $sentData['slug'] = Str::slug( $sentData['title'], '-');

        $comic->create($sentData);

        return redirect()->route('comics.show', $sentData['slug'])->with('created', $sentData['title']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comic = Comic::where('slug', $slug)->firstOrFail();

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $comic = Comic::where('slug', $slug)->firstOrFail();
        
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $sentData = $request->all();

        $validatedData = $request -> validate($this->validationRules, $this->customValidationMessages);

        $comic = Comic::where('slug', $slug)->firstOrFail();
        $sentData['slug'] = Str::slug( $sentData['title'], '-');
        
        $comic->update($sentData);

        return redirect()->route('comics.show', $comic->slug)->with('edited', $sentData['title']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        // Comic::destroy($id);

        return redirect()->route('comics.index')->with('deleted', $comic->title);
    }
}
