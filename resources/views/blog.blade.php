<x-layout title="Blog">
    <div class="container mt-4">
        <h2 class="mb-4">List of Blog Posts</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('blog.create') }}" class="btn btn-success mb-3">Create New Post</a>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No posts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
