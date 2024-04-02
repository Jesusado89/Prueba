<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus>
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
    <button type="submit">Update Profile</button>
</form>
