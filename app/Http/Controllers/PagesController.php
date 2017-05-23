<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
    	return view('pages.home');
    }
    public function getRetete()
    {	
    	$recipes=Recipe::where('deleted',0)->Paginate(10);
    	return view('pages.recipes')->withRecipes($recipes);
    }

    public function getSearch()
    {

    	return view('pages.search');

    }

    public function postSearch(Request $request)
    {

    	/*$recipes = Recipe::find(2);

        foreach ($recipes->flavour as $flavour) {
            dump($flavour->name);
        } */

        if($request->title)
        {
            $recipes = Recipe::where('name','like','%'.$request->search.'%')->get();
           
            return view('pages.search_results')->withRecipes($recipes);
        }
        if($request->description)
        {
            $recipes = Recipe::where('description','like','%'.$request->search.'%')->get();
           
            return view('pages.search_results')->withRecipes($recipes);
        }
        if($request->author)
        {
            $user= User::where('name',$request->search)->first();
            if($user)
            {
            $recipes= Recipe::where('user_id',$user->id)->get();
            return view('pages.search_results')->withRecipes($recipes);
            }
        }

        if($request->flavour)
        {
            $recipes = Recipe::all();
            $name = $request->search;
            return view('pages.flavour_search')->withRecipes($recipes)->withName($name);
        }
        $recipes = Recipe::where('name','like','%'.$request->search.'%')->get();

        return view('pages.search_results')->withRecipes($recipes);
    }

    public function getAfiseaza($id)
    {
        $recipe = Recipe::find($id);
        return view('pages.show')->withRecipe($recipe);
    }

    public function getTop($period)
    {
        $recipes = Recipe::where('deleted',0)->orderBy($period,'desc')->limit(20)->paginate(10);
        if($period=='daily_amount')
        $top ='Zilnic';
        if($period=='weekly_amount')
        $top ='Saptamanal';
        if($period=='monthly_amount')
        $top ='Lunar';
        if($period=='total_amount')
        $top ='General';
        return view('pages.top')->withRecipes($recipes)->withTop($top);
    }
}
