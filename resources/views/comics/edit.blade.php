@extends('layouts.main')

@section('title', 'Edit Comic')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row justify-content-center">
            <div class="col-6">

                {{-- Specifico rotta e metodo del form --}}
                <form action="{{ route('comics.update', $comic->slug) }}" method="POST">
                    {{-- Inserisco CSRF di sicurezza di Laravel --}}
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" value="{{ $comic->title }}" type="text" class="form-control" id="title" aria-describedby="titleHelp" required>
                        <div id="titleHelp" class="form-text">Insert here your comic's title.</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required>{{ $comic->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label">Thumb image</label>
                        <input name="thumb" value="{{ $comic->thumb }}" type="text" class="form-control" id="thumb" aria-describedby="thumbHelp" required>
                        <div id="thumbHelp" class="form-text">Insert here your thumb image by writing the URL.</div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" value="{{ $comic->price }}" type="number" class="form-control" step="0.01" id="price" aria-describedby="priceHelp" required>
                        <div id="priceHelp" class="form-text">Insert here the comic's price (es: 9.99)</div>
                    </div>
                    <div class="mb-3">
                        <label for="series" class="form-label">Series</label>
                        <input name="series" value="{{ $comic->series }}" type="text" class="form-control" id="series" aria-describedby="seriesHelp" required>
                        <div id="seriesHelp" class="form-text">Insert here your comic's series. (es. action comics)</div>
                    </div>
                    <div class="mb-3">
                        <label for="sale-date" class="form-label">Sale Date</label>
                        <input name="sale_date" value="{{ $comic->sale_date }}" type="date" class="form-control" id="sale-date" aria-describedby="sale-dateHelp" required>
                        <div id="sale-dateHelp" class="form-text">Insert here your comic's sale date.</div>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" name="type" id="type" required >
                            <option value="comic book" {{($comic->type == 'comic book') ? 'selected' : ''}}>Comic Book</option>
                            <option value="graphic novel" {{$comic->type == 'graphic novel' ? 'selected' : ''}}>Graphic Novel</option>
                            <option value="other" {{($comic->type == 'other') ? 'selected' : ''}}>Other</option>
                        </select>
                        <div id="typeHelp" class="form-text">Insert here your comic's type (es. comic book).</div>
                    </div>
                    
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-lg btn-primary text-uppercase fw-bold">Edit your comic</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
