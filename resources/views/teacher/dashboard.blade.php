<h1>Dashboard Teacher</h1>

<p>Welcome, {{ Auth::user()->name }}!</p>
<p>You are logged in as a Teacher.</p>
<p>Here you can manage your classes and students.</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-red-500 hover:underline">Logout</button>
</form>
