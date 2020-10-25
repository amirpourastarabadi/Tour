@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{route('admin.tourAdmins.create')}}"><h3>create new Tour Admin</h3></a>

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
                                    <th scope="col">Manager</th>
                                    <th scope="col">Agency</th>
                                    <th scope="col">Opening At</th>
                                    <th scope="col">Guild Code</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone number</th>
                                    <th scope="col">operations</th>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{$item->user->first_name}} {{$item->user->last_name}}</td>
                                            <td>{{$item->agency}}</td>
                                            <td>{{$item->start_at}}</td>
                                            <td>{{$item->guild_code}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->telephone_number}}</td>
                                            <td class="td-actions text-center d-flex justify-content-between">

                                                <a href="{{ route('admin.tourAdmin.keyGenerate', $item) }}"
                                                   rel="tooltip" class="btn btn-primary"
                                                   title="{{ __('Admin.list.key') }}"
                                                   onclick="return confirm('{{ __('Admin.alerts.admin.confirm_key', ['first_name' => $item->user->first_name, 'last_name' => $item->user->last_name]) }}');">
                                                    <i class="material-icons">vpn_key</i>
                                                </a>


                                                <a href="{{ route('admin.tourAdmins.edit', $item) }}" rel="tooltip"
                                                   class="btn btn-success"
                                                   title="{{ __('Admin.list.edit') }}">
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                <form action="{{ route('admin.tourAdmins.destroy', $item) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            onclick="return confirm('{{ __('Admin.list.confirm_delete', ['first_name' => $item->user->first_name, 'last_name' => $item->user->last_name]) }}')"
                                                            rel="tooltip" class="btn btn-danger"
                                                            title="{{ __('Admin.list.delete') }}">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>

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
