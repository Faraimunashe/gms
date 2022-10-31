<x-app-layout>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card" id="pakati">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Verify Product</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{route('user-check-search')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" name="search" class="form-control" id="price" placeholder="Product Code" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary me-2">Verify</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
