<x-layout>
    <div class="flex flex-row justify-between items-center px-6 pb-2 mb-6 border-b-2 border-gray-300">
        <a href="{{ route('posts.edit', $post) }}" class="bg-gray-600 rounded px-3 py-1 text-gray-100">Editar Post</a>
        <a href="{{ route('posts.create') }}" class="bg-blue-600 rounded px-3 py-1 text-gray-100">Crear Post</a>
    </div>

    <h2 class="text-center text-4xl mb-6">{{ $post->title }}</h2>

    <span class="bg-blue-300 px-2 py-1 rounded rounded-xl font-bold text-sm">{{ $post->category->name }}</span>

    <p class="text-xl mt-4 mb-6">{{ $post->body }}</p>

    <form action="{{ route('posts.destroy', $post) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-md px-2 py-1 text-center">Eliminar Post</button>
    </form>
</x-layout>