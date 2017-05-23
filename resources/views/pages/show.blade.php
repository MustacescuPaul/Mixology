@extends('main')

@section('title'," {{ $recipe->name }} ")

@section('content')
	

		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center"> {{ $recipe->name }}</h2>				

			</div>

		</div>
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
				<h3 class="text-center"> {{ $recipe->description }}</h2>				

			</div>

		</div>
		
				@foreach($recipe->flavour as $flavour)
				<div class="row text-center">
			
					<div class="col-md-6 ">
						<p>{{$flavour->name}}</p>	
						
					</div>
					<div class="col-md-6 ">
						<p>Cantitate : {{$flavour->pivot->ml_mixer}} ml</p>
					</div>
				</div>	
				@endforeach	
	
			
		<div class="row">
			
			<div class="col-md-6 ">
							
				{!! Html::linkRoute('recipes.edit','Editeaza',[$recipe->id],['class'=>'btn btn-primary btn-block']) !!}</td>

				</div>

	        	<div class="col-md-6 ">
	     	{!! Form::open(['method' => 'DELETE', 'route' => ['recipes.destroy',$recipe->id]]) !!}	     	
	     		{!! Form::submit('Sterge', ['class' => 'btn btn-danger btn-block']) !!}</td>
			{!! Form::close() !!}
		
			</div>

		</div>
	  

@endsection