<x-app-layout>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Product #{{$productid}} Items</h4>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($items as $item)
                            <tr>
                                <td class="py-1">
                                    @php
                                        $count ++;
                                        $product = get_product_by_id($item->product_id);
                                        echo $count;
                                    @endphp
                                </td>
                                <td>
                                    {{$item->code}}
                                </td>
                                <td>
                                    {{$product->name}}
                                </td>
                                <td>
                                    {{$product->price}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                {{$items->links('pagination::bootstrap-4')}}
              </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
</x-app-layout>
