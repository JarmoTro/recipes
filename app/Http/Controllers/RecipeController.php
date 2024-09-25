<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function getRecipesPage(){
        return view('recipes');
    }
}
