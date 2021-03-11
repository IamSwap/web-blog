<div class="space-y-2">
    <div class="flex items-center mb-2 space-x-2">
        <div class="w-8 h-8 rounded-full overflow-hidden border">
            <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="w-full">
        </div>
        <span class="font-semibold text-sm">{{ $post->user->name }}</span>
    </div>

    <a href="{{ route('posts.show', [$post]) }}" class="font-semibold text-xl">{{ $post->title }}</a>
    <p class="text-gray-500">{{ $post->short_description }}</p>

    <span class="text-gray-700 block text-sm">
        {{ $post->publication_date->toFormattedDateString() }}
    </span>
</div>