<form action="{{ url('login') }}" method="POST">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    <input type="email" name="email">
    @error('email')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
    <input type="password" name="password">
    <button type="submit">OK</button>
</form>
