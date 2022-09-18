@extends('layouts.main')

@section('title', 'Comic: ' . $comic->title)

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row">
            <div class="col-12">
                
                <div class="card text-center text-white bg-dark">
                    <div class="card-header text-uppercase fw-bold">
                      {{ $comic->type }} - {{ $comic->series }}
                    </div>
                    <div class="card_thumb text-center mt-3">
                        <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">{{ $comic->title }}</h4>
                      <p class="card-text px-5">{{ $comic->description }}</p>
                      <h5 class="card-text">${{ $comic->price }}</h5>
                      <div class="d-flex justify-content-center gap-4">
                        <a href="{{ route('comics.edit', $comic->slug) }}" class="btn btn-success my-4">Edit this comic</a>

                        <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger my-4">Remove this comic</button>
                        </form>

                      </div>
                    </div>
                    <div class="card-footer text-white">
                        Sale date: {{ $comic->sale_date }}
                    </div>
                  </div>

            </div>
        </div>
    </div>
@endsection
