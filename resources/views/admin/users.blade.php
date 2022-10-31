<x-app-layout>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Users</h4>
                <p class="card-description">
                    Available users
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($users as $item)
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
                                    {{$item->email}}
                                </td>
                                <td>
                                    {{get_user_role($item->id)}}
                                </td>
                                <td>
                                    {{$item->created_at}}
                                </td>
                                <td>
                                    <a href="{{route('admin-messages', $item->id)}}">
                                        Chat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                {{$users->links('pagination::bootstrap-4')}}
              </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
</x-app-layout>
