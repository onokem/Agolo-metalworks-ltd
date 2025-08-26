@extends('layouts.app')
@section('title','Admin Login')
@section('content')
<div class="max-w-md mx-auto py-16 px-4">
  <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>
  <form method="POST" action="{{ route('admin.login') }}" class="space-y-4 bg-white p-6 rounded-xl shadow">
    @csrf
    <div>
      <label class="block text-sm font-medium mb-1">Username</label>
      <input type="text" name="username" value="{{ old('username') }}" class="form-input w-full" required autofocus>
      @error('username')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Password</label>
      <input type="password" name="password" class="form-input w-full" required>
      @error('password')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
    <button class="btn-primary w-full" type="submit">Login</button>
  </form>
</div>
@endsection
