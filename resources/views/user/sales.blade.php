<x-app-layout>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Sales</h4>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Items</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($sales as $item)
                            <tr>
                                <td class="py-1">
                                    @php
                                        $count ++;
                                        echo $count;
                                    @endphp
                                </td>
                                <td>
                                    {{$item->amount}}
                                </td>
                                <td>
                                    {{count_sold_items($item->id)}}
                                </td>
                                <td>
                                    {{$item->created_at}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                {{$sales->links('pagination::bootstrap-4')}}
              </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
</x-app-layout>
