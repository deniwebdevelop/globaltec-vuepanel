<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
    <div class="text-center pt-10">
    <h1 class="text-2x1">Tareas</h1>
    <form action="{{ route('todo.store') }}" method="POST" class="py-5">
    @csrf
    <input type="text" name="title" class="py-2 px-2 boeder rounded">
    <input type="submit" value="create" class="p-2b border rounded">
    </form>
    </div>
</body>
</html>