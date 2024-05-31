<x-layout>
    <div class="flex flex-row justify-between items-center px-6 pb-2 mb-6 border-b-2 border-gray-300">
        <a href="{{ route('posts.edit', $post) }}" class="bg-gray-600 rounded px-3 py-1 text-gray-100">Editar Post</a>
        <a href="{{ route('posts.create') }}" class="bg-blue-600 rounded px-3 py-1 text-gray-100">Crear Post</a>
    </div>

    <h2 class="text-center text-4xl">{{ $post->title }}</h2>

    <p class="text-xl mt-4">{{ $post->body }}</p>
</x-layout>