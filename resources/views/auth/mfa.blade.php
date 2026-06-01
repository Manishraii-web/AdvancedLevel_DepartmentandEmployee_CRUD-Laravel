<form method="POST" action="{{ route('admin.mfa.verify') }}">
    {{-- @csrf --}}

    <h2>Enter OTP</h2>

    <input type="text" name="otp" placeholder="6-digit OTP">

    @error('otp')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <button type="submit">Verify</button>
</form>
