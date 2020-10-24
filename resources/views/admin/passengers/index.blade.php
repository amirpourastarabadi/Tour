@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{route('admin.passengers.create')}}"><h3>create new passenger</h3></a>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Passenger list</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th scope="col">first name</th>
                                    <th scope="col">last name</th>
                                    <th scope="col">national code</th>
                                    <th scope="col">birthday</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone number</th>
                                    <th scope="col">operations</th>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{$item->first_name}}</td>
                                            <td>{{$item->last_name}}</td>
                                            <td>{{$item->national_code}}</td>
                                            <td>{{$item->birthday}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->mobile_number}}</td>
                                            <td>
                                                <div class="row">
                                                    <a class="btn btn-sm btn-primary"
                                                       href="{{ route('admin.passengers.edit', $item) }}">Edit</a>
                                                    <form action="{{route('admin.passengers.destroy', $item)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button id="delete" class=" btn btn-sm btn-primary"
                                                                type="submit"
                                                                value="delete">Delete
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $items->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

                @endsection

                @push('js')
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script type="text/javascript">
                        $('#delete').click(function (e) {
                            var result = confirm("Are you sure you want to delete this user?");
                            if (!result) {
                                e.preventDefault();
                            }
                        });
                    </script>
    @endpush
