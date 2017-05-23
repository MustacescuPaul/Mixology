@extends('main')

@section('title','| Creeaza Reteta')

@section('content')
	

		
		<form action="{{route('recipes.test',$recipe->id)}}" method="POST">
			
			<label for="name" >Nume Reteta</label>
			<input type="text" name="name" class="form-control" {{session('name')?"value=".session('name'):""}}>

			<label for="description" >Descriere Reteta</label>
			<textarea rows="4" cols="50" name="description" class="form-control" >{{session('description')?session('description'):""}}</textarea>
			
			<input type="submit" name="save_recipe" value="Salveaza Reteta" class="btn btn-success pull-right spacing-top-50">
			
		
	
			<select name="flavour" class="form-control spacing-top-50">
			@foreach($flavours as $flavour)
				<option value="{{$flavour->name}}">{{$flavour->name}}</option>
			@endforeach
			</select>

			<input type="submit" name="add_flavour" value="Adauga Aroma" class="btn btn-primary spacing-top-50">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		
	
		<table>
		@if(session('flavours'))
			@foreach(session('flavours') as $key=>$value)
			
				<div class="row">
					<div class="col-md-1 col-md-offset-1">
						{{$value}}
						</div>
						<div class="col-md-1">
						<output name="out" >0</output>
						</div>
						<div class="col-md-8">
						<input type="range" name="v" min="0" max="10" step="0.1" class="form-control">
						</div>
						<div class="col-md-1">
						<input type="submit" name="delete" value="Sterge" class="btn btn-danger">
						<input type="hidden" name="to_del" value="{{$value}}">
						<input type="hidden" name="id".{{$value}} value="{{$key}}">
						<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						</div>
					</div>
				</div>
			 </form>
	
			@endforeach
			@endif
	
	      </table>
	 
	

@endsection