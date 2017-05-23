@extends('main')

<title>Top {{$top}}</title>

@section('content')

	

	<div class="container-fluid">                                                                                      
	  <div class="table-responsive">
	  <h1 class="text-center">Top {{$top}}</h1>      
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Reteta</th>
	        <th>Descriere</th>
	        <th>Autor</th>
	      </tr>
	    </thead>
	    @foreach($recipes as $recipe)
	    <tbody>
	      <tr>
	        <td>{{$recipe->name}}</td>
	        <td>{{substr($recipe->description,0,50)}}{{strlen($recipe->description) > 50?'...':''}}</td>
	        <td>{{$recipe->user->name}}</td>
	        <td>{!! Html::linkRoute('pages.show','Afiseaza',[$recipe->id],['class'=>'btn btn-primary btn-block']) !!}</td>
	      </tr>
	    </tbody>
	    @endforeach
	  </table>
	  <div class="text-center">{{$recipes->links()}}</div>
	  </div>
</div>





@endsection