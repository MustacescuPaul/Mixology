@extends('main')

@section('title','| Retete')

@section('content')

	<div class="container-fluid">                                                                                      
	  <div class="table-responsive">          
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Reteta</th>
	        <th>Descriere</th>
	        <th>Autor</th>
	      </tr>
	    </thead>
	    @foreach ($recipes as $recipe) 
            @foreach ($recipe->flavour as $flavour) 
            	@if(str_contains($flavour->name,title_case($name)))        
		    <tbody>
		      <tr>
		        <td>{{$recipe->name}}</td>
		        <td>{{substr($recipe->description,0,250)}}{{strlen($recipe->description) > 250?'...':''}}</td>
		        <td>{{$recipe->user->name}}</td>
		      </tr>
		    </tbody>
		    	@endif
	    	@endforeach
	    @endforeach
	  </table>
	  </div>
</div>



@endsection