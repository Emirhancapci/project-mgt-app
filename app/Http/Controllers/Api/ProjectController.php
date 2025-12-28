<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project; 
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        try {
            // Projenizin modelini ve ilişkilerini buraya yazın
            $projects = Project::with(['user']) // İlişkilerinizi ekleyin
                ->latest()
                ->get();

            return response()->json([
                'success' => true,
                'data' => $projects
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Projeler yüklenirken bir hata oluştu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Project $project)
    {
        try {
            $project->load(['user']); // İlişkilerinizi ekleyin
            
            return response()->json([
                'success' => true,
                'data' => $project
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Proje yüklenirken bir hata oluştu',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}