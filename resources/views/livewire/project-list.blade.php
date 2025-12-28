<div class="container mx-auto px-4 py-8">
    
    <!-- Header & Search -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Projeler</h1>
                <p class="text-gray-600">Tüm aktif projelerimizi görüntüleyin</p>
            </div>
            
            <!-- Search Bar -->
            <div class="w-full md:w-96">
                <input 
                    wire:model.live.debounce.300ms="search"
                    type="text" 
                    placeholder="Proje ara..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>
        </div>
    </div>

    <!-- Loading Indicator -->
    <div wire:loading class="mb-4">
        <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded">
            Yükleniyor...
        </div>
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @forelse($projects as $project)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                
                <!-- Project Header -->
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $project->name }}</h3>
                        <span class="px-3 py-1 text-xs font-medium rounded-full
                            @if($project->status === 'active') bg-green-100 text-green-800
                            @elseif($project->status === 'pending') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ $project->status }}
                        </span>
                    </div>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $project->description }}</p>
                    
                    <!-- Project Meta -->
                    <div class="space-y-2 text-sm text-gray-500">
                        @if($project->user)
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>{{ $project->user->name }}</span>
                        </div>
                        @endif
                        
                        @if($project->start_date)
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($project->start_date)->format('d.m.Y') }}</span>
                        </div>
                        @endif
                        
                        @if($project->tasks && $project->tasks->count())
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span>{{ $project->tasks->count() }} görev</span>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Project Footer -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    <button 
                        wire:click="viewProject({{ $project->id }})"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                        Detayları Gör
                    </button>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Proje bulunamadı</h3>
                <p class="mt-1 text-sm text-gray-500">
                    @if($search)
                        "{{ $search }}" araması için sonuç bulunamadı.
                    @else
                        Henüz proje eklenmemiş.
                    @endif
                </p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $projects->links() }}
    </div>

    <!-- Modal -->
    @if($showModal && $selectedProject)
    <div 
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
        wire:click.self="closeModal">
        
        <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <!-- Modal Header -->
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $selectedProject->name }}</h2>
                        <span class="px-3 py-1 text-xs font-medium rounded-full
                            @if($selectedProject->status === 'active') bg-green-100 text-green-800
                            @elseif($selectedProject->status === 'pending') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ $selectedProject->status }}
                        </span>
                    </div>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="space-y-6">
                    <!-- Description -->
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-2">Açıklama</h3>
                        <p class="text-gray-600">{{ $selectedProject->description }}</p>
                    </div>
                    
                    <!-- Meta Info -->
                    <div class="grid grid-cols-2 gap-4">
                        @if($selectedProject->user)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Proje Sahibi</h4>
                            <p class="text-gray-900">{{ $selectedProject->user->name }}</p>
                        </div>
                        @endif
                        
                        @if($selectedProject->start_date)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Başlangıç Tarihi</h4>
                            <p class="text-gray-900">{{ \Carbon\Carbon::parse($selectedProject->start_date)->format('d.m.Y') }}</p>
                        </div>
                        @endif
                        
                        @if($selectedProject->end_date)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Bitiş Tarihi</h4>
                            <p class="text-gray-900">{{ \Carbon\Carbon::parse($selectedProject->end_date)->format('d.m.Y') }}</p>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Tasks -->
                    @if($selectedProject->tasks && $selectedProject->tasks->count())
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-3">Görevler ({{ $selectedProject->tasks->count() }})</h3>
                        <div class="space-y-2">
                            @foreach($selectedProject->tasks as $task)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex-1">
                                    <p class="font-medium text-gray-900">{{ $task->title }}</p>
                                    @if($task->description)
                                    <p class="text-sm text-gray-500 mt-1">{{ $task->description }}</p>
                                    @endif
                                </div>
                                <span class="ml-4 px-2 py-1 text-xs font-medium rounded
                                    @if($task->status === 'completed') bg-green-100 text-green-800
                                    @elseif($task->status === 'in_progress') bg-blue-100 text-blue-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $task->status }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>