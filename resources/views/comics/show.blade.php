@extends('layouts.main')

@section('title', 'Comic: ' . $comic->title)

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row">
            @if ( session('created'))
                <div class="alert alert-success">
                    "{{ session('created') }}" has been successfully created.
                </div>
            @endif

            @if ( session('edited'))
                <div class="alert alert-success">
                    "{{ session('edited') }}" has been successfully edited.
                </div>
            @endif
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

                        <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="form-comic-delete"
                            data-comic-name="{{ $comic->title }}">
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

@section('footer-scripts')
    <script>
        const deleteFormElements = document.querySelectorAll('.form-comic-delete');

        deleteFormElements.forEach(
            formElement => {
                formElement.addEventListener('submit', function(event){
                    const name = this.getAttribute('data-comic-name');

                    event.preventDefault(); //blocco l'esecuzione automatica dell'evento di default
                    const result = window.confirm(`Are you sure you want to delete "${name}"?`); //chiedo conferma della cancellazione con un window confirm
                    if (result) this.submit(); //se l'utente risponde in maniera affermativa allora invio la submit
                })
            }
        )
    </script>
@endsection

