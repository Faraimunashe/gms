<x-guest-layout>
    <h6 class="font-weight-light">Register account to continue.</h6>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="pt-3" method="POST" action="{{route('register')}}">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email address" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" required>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                Register Account
            </button>
        </div>
        <div class="text-center mt-4 font-weight-light">
            Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
        </div>
    </form>
</x-guest-layout>

