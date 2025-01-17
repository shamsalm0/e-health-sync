<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $loginHistories->total() }}">
        </x-list-header>

    </div>
    {{-- end header  --}}

    <div class="">
        <div class="card mb-3">
            <div class="card-body">
                <x-table>
                    <x-thead>
                        <tr>
                            <th>#</th>
                            <th>User Id</th>
                            <th>Username</th>
                            <th>Request Ip</th>
                            <th>User Agent</th>
                            <th>Request For</th>
                            <th>Remark</th>
                            <th>Status</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($loginHistories as $loginHistory)
                            <tr>
                                <th scope="row" class="text-center">
                                    {{ ($loginHistories->currentPage() - 1) * $loginHistories->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $loginHistory->user_id }}</td>
                                <td>{{ $loginHistory->username }}</td>
                                <td>{{ $loginHistory->request_ip }}</td>
                                <td>{{ $loginHistory->user_agent }}</td>
                                <td>{{ $loginHistory->request_for }}</td>
                                <td>{{ $loginHistory->remark }}</td>
                                <td class="text-center align-middle">
                                    @if ($loginHistory->status == 'Success')
                                        <span class="badge bg-success">Success</span>
                                    @else
                                        <span class="badge bg-warning">Failed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>
        {{ $loginHistories->links() }}
    </div>
</div>
