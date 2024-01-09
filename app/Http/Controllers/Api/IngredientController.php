<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Http\Resources\IngredientCollection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IngredientCollection(Ingredient::all());
    }
    public function show(Request $request)
    {
        $ingredient = Ingredient::find($request->id);
        return new IngredientResource($ingredient);
    }
}
