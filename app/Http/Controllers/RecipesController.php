<?php

namespace App\Http\Controllers;
use App\Recipe;
use App\Flavour;
use App\Ingredient;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\custom\new_recipe;
use Session;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Session::forget('flavours');
        $recipes = Recipe::where('user_id',Auth::id())->where('deleted',0)->Paginate(10);

        return view('pages.my_recipes')->withRecipes($recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flavours = Flavour::all();
        return view('pages.create')->withFlavours($flavours);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(Input::get('save_recipe'))
        {
            //validare

            
            $recipe = new Recipe;
            $recipe->name=title_case($request->name);
            $recipe->description=$request->description;
            $recipe->user_id=Auth::id();
            $recipe->save(); 

            foreach ( session('flavours') as $key=>$value) {
                $recipe->flavour()->attach(Flavour::where('name',$value)->first()['id'],['ml_mixer'=>2,'ml_singles'=>1]);
            }
            $request->session()->forget('flavours');
            return redirect('recipes/');
        }
    elseif($request->add_flavour)
       {

    
        $value = session('flavours');
        if(session('flavours'))
        {
                if(!in_array($request->flavour, $value))
             $request->session()->push('flavours',$request->flavour);
         }elseif(!session('flavours'))
            $request->session()->push('flavours',$request->flavour);

        session(['name'=>$request->name]);
       
        session(['description'=>$request->description]);
        $flavours = Flavour::all();
        return view('pages.create')->withFlavours($flavours);
       }
       elseif($request->delete)
       {
            $fl=$request->session()->get('flavours');
            unset($fl[$request->id]);
            $request->session()->put('flavours',$fl);
             $flavours = Flavour::all();
            return view('pages.create')->withFlavours($flavours);

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        $recipe= Recipe::find($id);
        $flavours = Flavour::all();
        foreach($recipe->flavour as $flavour)
        {
           Session::push('flavours',$flavour->name);
        }
        session(['name'=>$recipe->name]);
        session(['description'=>$recipe->description]);

           return view('pages.edit')->withRecipe($recipe)->withFlavours($flavours);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
            
            $recipe = new Recipe;
            $recipe->name=title_case($request->name);
            $recipe->description=$request->description;
            $recipe->user_id=Auth::id();
            $recipe->save(); 

            foreach ( session('flavours') as $key=>$value) {
                $recipe->flavour()->attach(Flavour::where('name',$value)->first()['id'],['ml_mixer'=>2,'ml_singles'=>1]);
            }
            $request->session()->forget('flavours');
            
            $recipe = Recipe::find($id);
            $recipe->deleted=1;
            $recipe->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->deleted = 1;
        $recipe->save();

        return redirect()->route('recipes.index',$id);
    }

   public function delete_flavour(Request $request,$id)
   {

        $fl=$request->session()->pull('flavours');

        unset($fl[$request->id.$request->to_del]);
        $request->session()->put('flavours',$fl);

        session(['name'=>$request->name]);
       
        session(['description'=>$request->description]);
        $recipe= Recipe::find($id);
        $flavours = Flavour::all();
        return view('pages.edit')->withRecipe($recipe)->withFlavours($flavours);
   }

   public function add_flavour(Request $request,$id)
   {


        $value = session('flavours');
        if(session('flavours'))
        {
            if(!in_array($request->flavour, $value))
                Session::push('flavours',$request->flavour);
        }
        if(!session('flavours'))
            Session::push('flavours',$request->flavour);    
        
       
        session(['name'=>$request->name]);
       
        session(['description'=>$request->description]);
        $recipe= Recipe::find($id);
        $flavours = Flavour::all();
        return view('pages.edit')->withRecipe($recipe)->withFlavours($flavours);
   }

   public function postTest(Request $request,$id)
   {
    if($request->add_flavour)
        return $this->add_flavour($request,$id);
    if($request->delete)
        return $this->delete_flavour($request,$id);
    if($request->save_recipe)
        return $this->update($request,$id);
   }
}
