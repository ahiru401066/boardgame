<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Board Game</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Page Title -->
        <h1 class="text-4xl font-bold text-green-800 mb-6">Board Game</h1>

        <!-- Category Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h1 class="text-3xl font-semibold text-green-700 mb-4">カテゴリー</h1>
            <p class="text-gray-700 mb-4">
                カテゴリーの説明があります！カテゴリーの説明があります！カテゴリーの説明があります！カテゴリーの説明があります！カテゴリーの説明があります！カテゴリーの説明があります！
            </p>

            <!-- Games List -->
            @foreach ($games as $game)
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4 flex justify-between items-start">
                    <div class="flex-1">
                        <a href="/games/{{ $game->id }}" class="text-lg font-semibold text-green-600 hover:text-green-800">{{ $game->name }}</a>
                        <p class="text-gray-600 mt-2">{{ $game->body }}</p>
                    </div>
                    <form action="/games/{{ $game->id }}" id="form_{{ $game->id }}" method="POST" class="flex-shrink-0 ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteGame({{ $game->id }})" class="text-red-600 hover:text-red-800 font-semibold">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Back Link -->
        <a href="/" class="text-blue-600 hover:text-blue-800 text-lg">戻る</a>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $games->links() }}
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function deleteGame(id) {
            'use strict';
            if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</body>
</html>
