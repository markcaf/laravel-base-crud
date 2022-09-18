@extends('layouts.main')

@section('title', 'Main comics')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row">
            @if ( session('deleted'))
                <div class="alert alert-warning">
                    "{{ session('deleted') }}" has been successfully deleted.
                </div>
            @endif
            <div class="col-12">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Thumb</th>
                            <th scope="col">Series</th>
                            <th scope="col">Sale_date</th>
                            <th scope="col">Type</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($comics as $comic)
                            <tr>
                                <th scope="row">{{ $comic->id }}</th>
                                <td>
                                    <a href="{{ route('comics.show', $comic->slug) }}" class="link-light">
                                        {{ $comic->title }}
                                    </a>
                                </td>
                                <td>{{ $comic->description }}</td>
                                <td>
                                    <a href="{{ route('comics.show', $comic->slug) }}">
                                        <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                                    </a>
                                </td>
                                <td>{{ $comic->series }}</td>
                                <td>{{ $comic->sale_date }}</td>
                                <td>{{ $comic->type }}</td>
                                <td>
                                    <a href="{{ route('comics.edit', $comic->slug) }}" class="btn btn-sm btn-success">
                                        Edit
                                    </a>
                                </td>
                                <td>

                                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="form-comic-delete"
                                        data-comic-name="{{ $comic->title }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                    </form>
            
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="1">There are no comics available.</td>
                            </tr>
                            
                        @endforelse
                        
                    </tbody>
                </table>
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
