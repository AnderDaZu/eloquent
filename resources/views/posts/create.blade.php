<x-layout>
    <div class="flex flex-row justify-between items-center px-6 pb-2 mb-6 border-b-2 border-gray-300">
        <h1 class="text-xl">Crear Post</h1>
        <a href="{{ route('posts.index') }}" class="bg-gray-600 rounded px-3 py-1 text-gray-100">Ver Posts</a>
    </div>

    {{-- Opción para mostrar errores de validación --}}
    <div class="mb-6">
        @if ($errors->any())
            <ul class="bg-orange-300 px-2 py-1 max-w-sm rounded">
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-500">- {{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Título</label>
            <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('title') }}">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Contenido</label>
            <textarea id="body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Agrega contenido del post...">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900">Categoría</label>
            <select id="categories" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option disabled>>>--- Elige una categoría ---<<</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Crear post</button>
    </form>
</x-layout>
