<main class="form-signin pt-3">
  
  @include('inc.hero')

  @if (session('err'))
    <div class="alert alert-danger" role="alert">{{ session('err') }}</div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
  @endif

  <form action="{{ route('sign-in')}}" method="post">
    
    @csrf

    <h1 class="h3 mb-2 fw-normal">Please sign in</h1>

    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="floatingInput" name="username" autocomplete="off" value="{{old('username')}}" />
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" autocomplete="off" value="{{old('password')}}"/>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-2">
      <label>
        <input type="checkbox" value="1" name="remember" checked="checked" /> Remember me
      </label>
    </div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>