<form method="POST" action="{{ route('profile.update') }}">
    <div class="mb-3">
        @csrf
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus>
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

