@extends('layouts.main')

@section('content')

<form action="/login" method="POST" class="login-form mt-4">
  <div class="mb-3">
    <label for="login_username" class="form-label">Username</label>
    <input type="text" class="form-control" id="login_username">
  </div>
  <div class="mb-3">
    <label for="login_password" class="form-label">Password</label>
    <input type="password" class="form-control" id="login_password">
  </div>
  <button type="submit" class="btn btn-primary btn-login">Log in</button>
</form>

@endsection