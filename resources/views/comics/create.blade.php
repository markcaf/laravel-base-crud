@extends('layouts.main')

@section('title', 'Create a new Comic')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row justify-content-center">
            <div class="col-6">

                {{-- Specifico rotta e metodo del form --}}
                <form action="{{ route('comics.store') }}" method="POST">
                    {{-- Inserisco CSRF di sicurezza di Laravel --}}
                    @csrf

                    {{-- 
                        $newComic->title = $comic['title'];
                        $newComic->description = $comic['description'];
                        $newComic->thumb = $comic['thumb'];
                        $newComic->price = $comic['price'];
                        $newComic->series = $comic['series'];
                        $newComic->sale_date = $comic['sale_date'];
                        $newComic->type = $comic['type']; 
                    --}}

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp">
                        <div id="titleHelp" class="form-text">Insert here your comic's title.</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label">Thumb image</label>
                        <input name="thumb" type="text" class="form-control" id="thumb" aria-describedby="thumbHelp">
                        <div id="thumbHelp" class="form-text">Insert here your thumb image by writing the URL.</div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" type="number" class="form-control" step="0.01" id="price" aria-describedby="priceHelp">
                        <div id="priceHelp" class="form-text">Insert here the comic's price (es: 9.99)</div>
                    </div>
                    <div class="mb-3">
                        <label for="series" class="form-label">Series</label>
                        <input name="series" type="text" class="form-control" id="series" aria-describedby="seriesHelp">
                        <div id="seriesHelp" class="form-text">Insert here your comic's series. (es. action comics)</div>
                    </div>
                    <div class="mb-3">
                        <label for="sale-date" class="form-label">Sale Date</label>
                        <input name="sale_date" type="date" class="form-control" id="sale-date" aria-describedby="sale-dateHelp">
                        <div id="sale-dateHelp" class="form-text">Insert here your comic's sale date.</div>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input name="type" type="text" class="form-control" id="type" aria-describedby="typeHelp">
                        <div id="typeHelp" class="form-text">Insert here your comic's type (es. comic book).</div>
                    </div>
                    
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-lg btn-primary text-uppercase fw-bold">Submit your comic</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
