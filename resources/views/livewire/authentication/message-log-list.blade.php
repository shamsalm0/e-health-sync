<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $messageLogs->total() }}">
        </x-list-header>

    </div>
    {{-- end header  --}}

    <div class="">
        <div class="card mb-3">
            <div class="card-body">
                <x-table>
                    <x-thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Contact</th>
                            <th>Message Body</th>
                            <th>Response</th>
                            <th>Send For</th>
                            <th>CreatedBy</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($messageLogs as $messageLog)
                            <tr>
                                <th scope="row" class="text-center">
                                    {{ ($messageLogs->currentPage() - 1) * $messageLogs->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $messageLog->contact }}</td>
                                <td>{{ $messageLog->message_body }}</td>
                                <td>{{ $messageLog->response }}</td>
                                <td>{{ $messageLog->send_for }}</td>
                                <td>{{ $messageLog->user->name ?? 'n/a' }}</td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>
        {{ $messageLogs->links() }}
    </div>
</div>
