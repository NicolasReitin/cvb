<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Afficher tous les news
    public function index(): JsonResponse
    {
        return response()->json(News::all());
    }
    
    // Afficher un news spécifique
    public function show(News $news): JsonResponse
    {
        return response()->json($news);
    }


    // Créer un nouveau news
    public function store(NewsRequest $request): JsonResponse
    {
        $news = News::create($request->validated());

        return response()->json([
            'message' => __('news.news_created'),
            'data' => $news
        ], 201);

    }

    // Mettre à jour un news existant
    public function update(NewsRequest $request, News $news)
    {
        $news->update($request->validated());

        return response()->json([
            'message' => __('news.news_created'),
            'data' => $news
        ]);    }

    // Supprimer un news
    public function destroy(News $news): JsonResponse
    {
        $news->delete();

        return response()->json(['message' => __('news.news_deleted')], 204);
    }
}
