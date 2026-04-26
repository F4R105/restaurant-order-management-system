@if (session('success'))
    <div style="color: green; margin: 10px 0;">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div style="color: green; margin: 10px 0;">{{ session('error') }}</div>
@endif