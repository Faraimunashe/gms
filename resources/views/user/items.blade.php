<x-app-layout>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Sale #{{$saleid}} Items</h4>
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
                                        echo $count;
                                    @endphp
                                </td>
                                <td>
                                    {{$item->code}}
                                </td>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->price}}
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
