@extends('layouts.main')

@section('title', 'Main comics')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row">
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
