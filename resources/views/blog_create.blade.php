<x-layout title="Create New Post">
    <div class="container mt-4">
        <h2>Create a New Blog Post</h2>

        <form action="{{ route('blog.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Post</button>
            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-layout>
