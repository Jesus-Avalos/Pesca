@extends('layouts.app')

@section('content')
    <div class="content bg-white">
        <div align="center">
            <img src="{{ asset('storage/bassrio.png') }}" class="w-50" alt="Logo">
            <br>
            <v-btn href="/home" style="text-decoration: none" x-large class="bg-dark text-white mt-3">Home</v-btn>
        </div>
    </div>
@endsection