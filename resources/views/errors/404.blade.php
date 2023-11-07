@extends('layouts.apps')
@section('content')
    <section class="w-full px-4">
        <div class="max-w-2xl m-auto py-[150px] text-center">
            <div class="bg-white p-6 py-[50px] rounded-3xl shadow-lg">
                <h1 class="text-[140px] font-semibold leading-[120px]">404</h1>
                <p>Page Not Found!</p>
                <button onclick="history.back()" class="py-2 px-5 mt-4 rounded-md bg-black text-white inline-block">Go Back</button>
            </div>
        </div>
    </section>
@endsection