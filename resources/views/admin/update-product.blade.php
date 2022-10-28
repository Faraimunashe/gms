<x-app-layout>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card" id="pakati">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Product</h4>
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
                    <form class="forms-sample" method="POST" action="{{route('admin-edit-product')}}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}" required>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Product</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-sm-3 col-form-label">Quantity: {{$product->qty}} +</label>
                            <div class="col-sm-9">
                                <input type="number" name="qty" class="form-control" id="qty" value="0" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <button type="reset" class="btn btn-light" >Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
