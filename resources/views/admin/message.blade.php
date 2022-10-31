<x-app-layout>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 ">
                    <ul class="list-unstyled">
                        @foreach ($messages as $item)
                            @if ($item->action === 1)
                                <li class="d-flex justify-content-between mb-4">
                                    <img src="{{asset('assets/images/profile.jpeg')}}" alt="avatar"
                                        class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">{{get_user($item->user_id)->name}}</p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"></i> {{$item->created_at}}</p>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">
                                                {{$item->message}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="d-flex justify-content-between mb-4">
                                    <div class="card w-100">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">Me</p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"></i> {{$item->created_at}}</p>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">
                                                {{$item->message}}
                                            </p>
                                        </div>
                                    </div>
                                    <img src="{{asset('assets/images/profile.jpeg')}}" alt="avatar"
                                        class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                                </li>
                            @endif
                        @endforeach
                            <form method="POST" action="{{route('admin-send')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user_id}}" required>
                                <li class="bg-white mb-3">
                                    <div class="form-outline">
                                        <textarea class="form-control" id="textAreaExample2" name="message" required rows="4"></textarea>
                                        <label class="form-label" for="textAreaExample2">Message</label>
                                    </div>
                                </li>
                                <button type="submit" class="btn btn-info btn-rounded float-end">Send</button>
                            </form>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
