<?php

namespace App\Livewire;

use App\Models\Project; // Model'inize göre düzenleyin
use Livewire\Component;
use Livewire\WithPagination;

class ProjectList extends Component
{
    use WithPagination;

    // Public properties - otomatik reactive
    public $search = '';
    public $selectedProject = null;
    public $showModal = false;
    
    // Query string için
    protected $queryString = ['search'];

    // Search değiştiğinde pagination'ı resetle
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Proje detayını göster
    public function viewProject($projectId)
    {
        $this->selectedProject = Project::with(['client', 'tasks'])->find($projectId);
        $this->showModal = true;
    }

    // Modal'ı kapat
    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedProject = null;
    }

    // Render metodu
    public function render()
    {
        $projects = Project::query()
            ->with(['client']) // İlişkilerinizi ekleyin
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(9);

        return view('livewire.project-list', [
            'projects' => $projects
        ]);
    }
}