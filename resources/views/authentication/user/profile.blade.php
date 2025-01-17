@extends('admin.layouts.app')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            max-width: 600px;
            margin: 0px auto;
        }

        .profile-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    @php
        $bsfic = App\Models\Mill::find(1);
        $bsfic_logo = $bsfic ? $bsfic->logo : '';
    @endphp
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-picture mx-auto">
                @if ($user->mill_id && $user->mill->logo)
                    <img src="{{ url($user->mill->logo) }}" alt="Profile Picture">
                @elseif($bsfic_logo)
                    <img src="{{ url($bsfic_logo) }}" alt="Profile Picture">
                @else
                    <span>No profile picture available</span>
                @endif
            </div>
            <h2 class="text-center">{{ $user->name }} ({{ $user->username }})</h2>
            <p class="text-center text-muted">{{ $user->mill_id ? $user->mill->name : 'N/A' }}</p>
            <p class="text-center text-muted">Center: {{ $user->center_id ? $user->center->name : 'N/A' }}, Unit:
                {{ $user->unit_id ? $user->unit->name : 'N/A' }}</p>
            <hr>
            <div class="">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Nid:</strong> {{ $user->nid ?? 'N/A' }}</p>
                <p><strong>Contact:</strong> {{ $user->contact ?? 'N/A' }}</p>
                <p><strong>Designation:</strong> {{ $user->designation_id ? $user->designation->name : 'N/A' }}</p>
                <p><strong>Department:</strong> {{ $user->department_id ? $user->department->name : 'N/A' }}</p>
                <p><strong>Section:</strong> {{ $user->section_id ? $user->section->name : 'N/A' }}</p>
                <p><strong>Address:</strong> {{ $user->address ?? 'N/A' }}</p>
            </div>
            <div class="text-center">
                <a href="{{ route('password.change') }}" class="btn btn-info  text-light mr-2 nav-link"> Change Password
                </a>
            </div>
        </div>
    </div>
@endsection
