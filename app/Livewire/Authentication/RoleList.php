<?php

namespace App\Livewire\Authentication;

use App\Traits\HasPermission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    use HasPermission,WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $filter = true;

    public $permissions;

    public $permission;

    public $per_page = 15;

    public $search;

    public function updated($attr): void
    {
        $this->gotoPage(1);
    }

    public function mount(): void
    {
        $this->permissions = Permission::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public function delete($id): void
    {
        if (! $this->hasPermission('Role Delete')) {
            return;
        }
        DB::table('roles')->where('id', $id)->delete();
        session()->flash('type', 'Success');
        session()->flash('message', 'Role deleted successfully.');

    }

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        $search = $this->search;
        $permission = $this->permission;
        $per_page = ((int) $this->per_page) > 500 ? 500 : (int) $this->per_page;

        return view('livewire.authentication.role-list', [
            'roles' => Role::with([])
                ->where(function ($query) use ($search, $permission) {
                    if ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    }
                    if ($permission) {
                        $query->whereHas('permissions', function ($query) use ($permission) {
                            $query->where('id', $permission);
                        });
                    }
                })
                ->latest()
                ->paginate($per_page),
        ]);
    }
}
