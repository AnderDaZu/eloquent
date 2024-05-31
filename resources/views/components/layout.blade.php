<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Component</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-300">
        <div class="max-w-4xl mx-auto p-4">
            <div class="w-full md:block md:w-auto">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="/" class="py-2 px-3 bg-blue-700 text-gray-900 md:bg-transparent md:hover:text-blue-700 md:p-0" >Home</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.index') }}" class="py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Posts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  
    <div class="max-w-4xl mx-auto my-10">
        {{ $slot }}
    </div>
</body>
</html>