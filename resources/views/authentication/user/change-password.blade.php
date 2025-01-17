@extends('admin.layouts.app')
@section('header')
    <h1 class="title">Change User Password</h1>
@endsection

@section('content')
    <table class="table table-sm table-bordered" style="max-width: 500px;">
        <tr>
            <td>Name</td>
            <th class="text-lest">{{ $user->name }}</th>
        </tr>
        <tr>
            <td>Username</td>
            <th class="text-lest">{{ $user->username }}</th>
        </tr>
        <tr>
            <td>Email</td>
            <th class="text-lest">{{ $user->email }}</th>
        </tr>
        <tr>
            <td>Contact</td>
            <th class="text-lest">{{ $user->contact ?? '' }}</th>
        </tr>
    </table>
    <div class="card">
        <div class="card-body">

            @include('component.alert')

            <form method="POST" action="{{ route('users.updatePassword', $user->id) }}" role="form" id="myForm"
                onsubmit="return confirmSubmission()">
                @csrf
                <p>A message will be sent to user's phone with new password</p>
                <button type="submit" value="submit" class="btn btn-sm btn-primary mt-3">Click to reset Password</button>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        function confirmSubmission() {
            event.preventDefault();

            Swal.fire({
                title: `Are you sure to reset your password?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, submit!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Submission Confirms');
                    document.getElementById('myForm').submit();
                } else {
                    console.log('Submission Cancelled');
                }
            });

            return false;
        }
    </script>
@endpush
