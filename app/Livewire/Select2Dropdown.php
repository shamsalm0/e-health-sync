<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class Select2Dropdown extends Component
{
    #[Modelable]
    public $selectValue = null;

    public $name;

    public $options;

    public $searchRoute; // New property for search route

    public function mount($name, $options, $searchRoute): void
    {
        $this->name = $name;
        $this->options = $options;
        $this->searchRoute = $searchRoute;
    }

    public function selectSearch(Request $request, $model): JsonResponse
    {
        $search = $request->query('term', '');
        // Check if the model exists
        $modelClass = '\\App\\Models\\'.ucfirst($model);
        if (! class_exists($modelClass)) {
            return response()->json(['error' => 'Model not found'], 404);
        }

        $results = $modelClass::where('name', 'like', '%'.$search.'%')
            ->take(5)
            ->get();

        return response()->json($results);
    }

    public function render(): \Illuminate\Contracts\View\View|Factory|Application|View
    {
        return view('livewire.select2-dropdown');
    }
}
