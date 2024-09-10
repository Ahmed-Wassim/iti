<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <a href="/posts/create" class="btn btn-primary">create</a>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Body</th>
                <th scope="col">CreatedAt</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td scope="row">{{ $post->title }}</td>
                    <td scope="row">{{ $post->slug }}</td>
                    <td scope="row">{{ $post->body }}</td>
                    <td scope="row">{{ $post->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ url('/posts/' . $post->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ url('/posts/' . $post->id . '/edit') }}" class="btn btn-info">Edit</a>
                        {{-- <a href="/posts/{{ $post['id'] }}/delete" class="btn btn-danger">Delete</a> --}}
                        <form action="/posts/{{ $post['id'] }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
