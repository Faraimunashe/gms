<x-guest-layout>
    <h6 class="font-weight-light">Login as user to continue.</h6>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="pt-3" method="POST" action="{{route('login')}}">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email address" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="mt-3">
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        Login
                    </button>
                </div>
                <div class="col-md-6">
                    <a href="/admin-login" class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn">
                        Admin
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4 font-weight-light">
            Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
        </div>
    </form>
</x-guest-layout>
