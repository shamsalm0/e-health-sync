<?php

namespace App\Livewire\Authentication;

use App\Models\PasswordHistory;
use App\Models\Sms;
use App\Models\User;
use App\Traits\HasPermission;
use App\Traits\PasswordGenerator;
use App\Traits\SendSms;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserList extends Component
{
    use HasPermission, PasswordGenerator, SendSms, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $per_page = 15;

    public $filter = true;

    public $search;

    public $roles;

    public $role;

    public $permissions;

    public $permission;

    public $status = '';

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function mount(): void
    {
        $this->roles = Role::orderBy('name')->pluck('name')->toArray();
        $this->permissions = Permission::orderBy('name')->pluck('name')->toArray();
    }

    public function toggleStatus($userId): void
    {
        if (! $this->hasPermission('User Edit')) {
            return;
        }
        $user = User::findOrFail($userId);

        if (! $user->contact) {
            session()->flash('type', 'Warning');
            session()->flash('message', 'Contact number can not be empty.');

            return;
        }
        if ($user->status == 0) {
            $password = $this->generatePassword();
            $sms = Sms::where('title', 'User Activate')->latest()->first();
            if (! $sms) {
                session()->flash('type', 'Error');
                session()->flash('message', 'Sms configuration is not set up. Please contact with support');

                return;
            }

            $from = ['#username#', '#password#'];
            $to = [$user->username, $password];
            $message = trim(str_replace($from, $to, $sms->body));
            $user->status = 1;
            $user->password = $password;
            $user->password_changed_at = null;
            $user->save();
            PasswordHistory::create([
                'user_id' => $user->id,
                'password' => bcrypt($password),
            ]);
            $this->sendLocalSms($user->contact, $message, 'Password Reset');
            $message = 'Active user successfully';
        } else {
            $user->status = 0;
            $user->save();
            $message = 'User Inactive successfully';
        }
        session()->flash('type', 'Success');
        session()->flash('message', $message);
    }

    public function delete($userId): void
    {
        if (! $this->hasPermission('User Delete')) {
            return;
        }
        // User::findOrFail($userId)->delete();
        session()->flash('type', 'Error');
        session()->flash('message', "User can't be deleted.");

    }

    public function toggleOTPStatus($userId): void
    {
        if (! $this->hasPermission('User Edit')) {
            return;
        }
        $user = User::findOrFail($userId);
        // Toggle the status value
        $user->otp_verified = ! $user->otp_verified;
        $user->save();

        $message = $user->otp_verified ? 'OTP enabled successfully' : 'OTP disabled successfully';

        session()->flash('type', 'Success');
        session()->flash('message', $message);
    }

    public function toggleEmailStatus($userId): void
    {
        if (! $this->hasPermission('User Edit')) {
            return;
        }
        $user = User::findOrFail($userId);
        // Toggle email verification
        $user->mail_verified = ! $user->mail_verified;
        $user->save();

        $message = $user->mail_verified ? 'Email verification enabled successfully' : 'Email verification disabled successfully';

        session()->flash('type', 'Success');
        session()->flash('message', $message);
    }

    public function toggleContactStatus($userId): void
    {
        if (! $this->hasPermission('User Edit')) {
            return;
        }
        $user = User::findOrFail($userId);
        // Toggle contact verification
        $user->contact_verified = ! $user->contact_verified;
        $user->save();

        $message = $user->contact_verified ? 'Contact verification enabled successfully' : 'Contact verification disabled successfully';

        session()->flash('type', 'Success');
        session()->flash('message', $message);
    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        $search = trim($this->search);
        $status = $this->status;
        $role = $this->role;
        $permission = $this->permission;
        $per_page = ((int) $this->per_page) > 500 ? 500 : (int) $this->per_page;

        return view('livewire.authentication.user-list', [
            'users' => User::query()
                ->when($this->search, function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                    $query->orWhere('username', 'like', '%'.$search.'%');
                    $query->orWhere('contact', 'like', '%'.$search.'%');
                    $query->orWhere('nid', 'like', '%'.$search.'%');
                    $query->orWhere('email', 'like', '%'.$search.'%');
                })
                ->where(function ($query) use ($status) {
                    if ($status != '') {
                        $query->where('status', $status);
                    }
                })
                ->when($permission || $role, function ($query) use ($permission, $role) {
                    if ($role) {
                        $query->role($role);
                    }
                    if ($permission) {
                        $query->permission($permission);
                    }
                })
                ->paginate($per_page),
        ]);
    }
}
