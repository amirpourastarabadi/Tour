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
                    <form action="{{ route('superAdmin.admin.show', $admin) }}" method="GET">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-info" title="{{ __('superAdmin.list.info') }}">
                            <i class="material-icons">person</i>
                        </button>
                    </form>

                    <form action="{{ route('superAdmin.admin.keyGenerate', $admin) }}" method="GET">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-primary" title="{{ __('superAdmin.list.key') }}"
                                onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_key', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]) }}');">
                            <i class="material-icons">vpn_key</i>
                        </button>
                    </form>

                    <form action="{{ route('superAdmin.admin.keyGenerate', $admin) }}" method="GET">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-primary" title="{{ __('superAdmin.list.key') }}"
                                onclick="return confirm('{{ __('superAdmin.alerts.admin.confirm_key', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]) }}');">
                            <i class="material-icons">vpn_key</i>
                        </button>
                    </form>

                    <form action="{{ route('superAdmin.admin.edit', $admin) }}" method="GET">
                        @csrf
                        <button type="submit" rel="tooltip" class="btn btn-success" title="{{ __('superAdmin.list.edit') }}">
                            <i class="material-icons">edit</i>
                        </button>
                    </form>

                    <form action="{{ route('superAdmin.admin.destroy', $admin) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('{{ __('superAdmin.list.confirm_delete', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]) }}')"
                                rel="tooltip" class="btn btn-danger" title="{{ __('superAdmin.list.delete') }}">
                            <i class="material-icons">close</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{{ $admins->links() }}</div>
    {{--#TODO create modals--}}
@endsection
