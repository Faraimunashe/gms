<x-app-layout>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Available Products</h4>
                <p class="card-description">
                    Add class <code>.table-striped</code>
                    <a href="{{route('admin-new-product')}}" class="btn btn-success" style="float: right;">
                        Add New
                    </a>
                </p>
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
                                    <a href="{{route('admin-update-product', $item->id)}}" class="btn btn-inverse-primary">
                                        Update
                                    </a>
                                    <a onclick="confirm('We are about to delete {{$item->name}}!');" href="{{route('admin-delete-product', $item->id)}}" class="btn btn-inverse-danger">
                                        Delete
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
    </div>
</x-app-layout>
