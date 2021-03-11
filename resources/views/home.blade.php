@extends('layouts.master')

@section('content')
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="font-bold text-3xl">Latest Posts</h1>

        @include('partials.filters')
    </div>

    <div class="border-t border-b py-8">
        @if ($posts->count())
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
                @foreach ($posts as $post)
                    @include('partials.post-card')
                @endforeach
            </div>
        @else
            <div class="py-12">
                @include('partials.no-posts')
            </div>
        @endif
    </div>

    <div class="py-6">
        {{ $posts->links() }}
    </div>
  </div>
@endsection