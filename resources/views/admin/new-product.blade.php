<x-app-layout>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card" id="pakati">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Form</h4>
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
                    <form class="forms-sample" method="POST" action="{{route('admin-add-product')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Product</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Product Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-sm-3 col-form-label">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" name="qty" class="form-control" id="qty" placeholder="Product Quantity" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control" id="price" placeholder="Product Price" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <button class="btn btn-light" type="reset">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
