@extends('layouts.superAdmin')

@section('content')

    <h3>Admins list</h3>
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>{{ __('superAdmin.list.first_name') }}</th>
            <th>{{ __('superAdmin.list.last_name') }}</th>
            <th>{{ __('superAdmin.list.mobile_number') }}</th>
            <th class="text-center">{{ __('superAdmin.list.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td class="text-center">{{ $count++ }}</td>
                <td>{{ $admin->first_name }}</td>
                <td>{{ $admin->last_name }}</td>
                <td>{{ $admin->mobile_number }}</td>
                <td class="td-actions text-center d-flex justify-content-between">
                    <form action="{{ route('admin.show', $admin) }}" method="GET">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-info" title="{{ __('superAdmin.list.info') }}">
                            <i class="material-icons">person</i>
                        </button>
                    </form>

                    {{--#TODO create key generate--}}
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-primary" title="{{ __('superAdmin.list.key') }}">
                            <i class="material-icons">vpn_key</i>
                        </button>
                    </form>

                    <form action="{{ route('admin.edit', $admin) }}" method="GET">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-success" title="{{ __('superAdmin.list.edit') }}">
                            <i class="material-icons">edit</i>
                        </button>
                    </form>
                    <form action="{{ route('admin.destroy', $admin) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger" title="{{ __('superAdmin.list.delete') }}">
                            <i class="material-icons">close</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{{ $admins->links() }}</div>
@endsection
