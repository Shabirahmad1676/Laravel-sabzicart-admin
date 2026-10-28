<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Todo App</title>
</head>
<body>
    <h1>My Todo App</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('todos.store') }}">
        @csrf

        <input
            type="text"
            name="title"
            placeholder="Todo title"
            value="{{ old('title') }}"
            required
            maxlength="255"
        >

        <br><br>

        <textarea
            name="description"
            placeholder="Description (optional)"
        >{{ old('description') }}</textarea>

        <br><br>

        <button type="submit">Add Todo</button>
    </form>

    <hr>

    <h2>My Tasks</h2>

    @forelse ($todos as $todo)
        <div>
            <h3>
                {{ $todo->is_completed ? '✅' : '⬜' }}
                {{ $todo->title }}
            </h3>

            <p>{{ $todo->description }}</p>

            <form method="POST"
                  action="{{ route('todos.toggle', $todo) }}">
                @csrf
                @method('PATCH')

                <button type="submit">
                    {{ $todo->is_completed ? 'Mark incomplete' : 'Mark complete' }}
                </button>
            </form>
        </div>
        <hr>
    @empty
        <p>No tasks yet. Add your first task!</p>
    @endforelse
</body>
</html>
