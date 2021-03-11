@extends('layouts.master')

@section('content')
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <div class="space-y-4 mb-6 pb-6 border-b">
            <h1 class="font-semibold text-2xl">{{ $post->title }}</h1>

            <div class="flex items-center mb-2 space-x-2">
                <div class="w-8 h-8 rounded-full overflow-hidden border">
                    <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="w-full">
                </div>
                <span class="font-semibold text-sm">{{ $post->user->name }}</span>

                <span class="text-gray-700 block text-sm">
                    On {{ $post->publication_date->toFormattedDateString() }}
                </span>
            </div>

            <p class="text-gray-500 prose-lg">{{ $post->description }}</p>
        </div>

        <a href="{{ url('/') }}">&laquo; {{ __('Go back') }}</a>
    </div>
@endsection