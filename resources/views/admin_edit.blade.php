<x-layout>
    <h1>Admin</h1>
    <div class="container mt-4">
        <h2 class="mb-4">Edit Admin</h2>

        <form action="{{ route('admin.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', $admin->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $admin->email) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-layout>
