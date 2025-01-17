<?php

namespace App\Livewire\Authentication;

use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Permission as PermissionModel;
use Spatie\Permission\Models\Role;

class PermissionList extends Component
{
    use HasPermission,WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $roles;

    public $role;

    public $filter = true;

    public $per_page = 15;

    public $search;

    public $status = '';

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function mount(): void
    {
        $this->roles = Role::orderBy('name')->pluck('name')->toArray();
    }

    public function delete($id): void
    {
        if (! $this->hasPermission('Permission Delete')) {
            return;
        }
        Permission::findOrFail($id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Permission deleted successfully.');

    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $role = $this->role;
        $per_page = ((int) $this->per_page) > 500 ? 500 : (int) $this->per_page;

        return view('livewire.authentication.permission-list', [
            'permissions' => PermissionModel::query()
                ->where(function ($query) use ($search, $role) {
                    if ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    }
                    if ($role) {
                        $query->role($role);
                    }
                })
                ->latest()
                ->paginate($per_page),
        ]);
    }
}
