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

                        @include('comics.includes.form')
                </form>

            </div>
        </div>
    </div>
@endsection
