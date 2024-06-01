<x-layout>
    
    <div class="flex flex-row justify-between items-center px-6 pb-2 mb-6 border-b-2 border-gray-300">
        <h1 class="text-xl">Posts</h1>
        <a href="{{ route('posts.create') }}" class="bg-blue-600 rounded px-3 py-1 text-gray-100">Crear Post</a>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" colspan="2" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $post->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->title }}
                        </td>
                        <td class="px-1 py-4 text-center" width="10px">
                            <a href="{{ route('posts.show', $post) }}">👁️‍🗨️</a>
                        </td>
                        <td class="px-1 py-4 text-center" width="10px">
                            <a href="{{ route('posts.edit', $post) }}">🖋️</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</x-layout>
