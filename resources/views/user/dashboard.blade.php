<x-app-layout>
    <div class="row">
        <div class="col-lg-8 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Available Products</h4>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit-Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($products as $item)
                            <tr>
                                <td class="py-1">
                                    @php
                                        $count ++;
                                        echo $count;
                                    @endphp
                                </td>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->qty}}
                                </td>
                                <td>
                                    {{$item->price}}
                                </td>
                                <td>
                                    <a href="{{route('user-add-cart', $item->id)}}" class="btn btn-inverse-primary">
                                        Add
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                {{$products->links('pagination::bootstrap-4')}}
              </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cart</h4>
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
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Count</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 0;
                                    $total = 0;
                                @endphp
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>
                                            @php
                                                $product = get_product($item->barcode_id);
                                                $total = $total + $product->price;
                                                $count++;
                                                echo $count;
                                            @endphp
                                        </td>
                                        <td>{{$product->name}} x 1</td>
                                        <td class="text-danger">${{$product->price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{route('user-checkout')}}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="amount" value="{{$total}}" required>
                            <h3 class="text-danger">$<strong>{{(float)$total}}</strong></h3>
                            <button type="submit" class="btn btn-success" style="float: right;">
                                Checkout
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
