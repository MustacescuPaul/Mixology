@extends('main')

@section('title','| Cautare')

@section('content')

	{!! Form::open(['method' => 'POST', 'route' => 'pages.search']) !!}
	
	   <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
	     <div class="text-center">  {!! Form::label('search', 'Cauta Reteta') !!} </div>
	       {!! Form::text('search', null, ['class' => 'form-control', 'required' => 'required']) !!}

	       <div class="row">
		       <div class="col-md-2">
		       	<label for="title">Cautare dupa titlu</label>
		       </div>

		       <div class="col-md-1">
		       	{!! Form::checkbox('title', '1', null, ['id' => 'title','class'=>'checkbox']) !!}
		       </div>

		       <div class="col-md-2">
		       	<label for="description">Cautare dupa descriere</label>
		       </div>
		       
		       <div class="col-md-1">
		       	{!! Form::checkbox('description', '1', null, ['id' => 'description','class'=>'checkbox']) !!}
		       </div>

		       <div class="col-md-2">
		       	<label for="author">Cautare dupa autor</label>
		       </div>
		       
		       <div class="col-md-1">
		       	{!! Form::checkbox('author', '1', null, ['id' => 'author','class'=>'checkbox']) !!}
		       </div>

		        <div class="col-md-2">
		       	<label for="flavour">Cautare dupa aroma</label>
		       </div>
		       
		       <div class="col-md-1">
		       	{!! Form::checkbox('flavour', '1', null, ['id' => 'flavour','class'=>'checkbox']) !!}
		       </div>
	       </div>
	       {{Form::submit('Cauta', ['class' => 'btn btn-success btn-block spacing-top-50']) }}
	       <small class="text-danger">{{ $errors->first('search') }}</small>
	   </div>
	
	{!! Form::close() !!}

@endsection