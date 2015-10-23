@extends('layout')

@section('title', 'Pizza task')

@section('content')
	<section id="home" data-speed="4" data-type="background">
		<div class="container">
			<div class="row animated fadeInUp">
				  <div class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3 text-center mycol ">
				  	
				  	


				  	<div id="four" class="row animated fadeInUp hidden">
				  <div class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3 text-center mycol ">
				  	<h2 class="text-center">Ваша пицца:</h2>
				  	Стоиомсть: <div id="price"></div> рублей <br>
				  	Ингредиенты:<div id="nam"></div>
				  	<button type="button" class="btn btn-lg btn-warning">Заказать!</button>
				  	</div>
				  	</div>


				  
   						 

				 @for ($i = 0; $i < 3; $i++)

				@if ($i==0)
      				<div id="one" class="row text-center" >
      				<h3 class="text-center">Шаг №1</h3>
      				<hr>
             <h4>Выберите толщину:</h4>
             
      			@endif

      				@if ($i==1)
      				<div id="two" class="row text-center hidden" >
      				<h3 class="text-center">Шаг №2</h3>
      				<hr>
             <h4>Выберите начинку:</h4>
            @endif

      				@if ($i==2)
      				<div id="three" class="row text-center hidden" >
      				<h3 class="text-center">Шаг №3</h3>
      				<hr>
             <h4>Выберите дополнение к пицце:</h4>
           			@endif
	@if ($i==0)
						@foreach ($elements as $element)
						 @if ($element->type=="dough")
					  <div class="col-sm-6 col-md-4">

					    <div class="thumbnail">
					      <img src="/images/{{$element->id}}.jpg" class="img-circle">
					      <div class="caption">
					        <h4>{{$element->name}}</h4>

					     <div class="radio">
					  		<label><input id="a1" type="radio" name="optradio" value="{{$element->id}}"></label>
						</div>

					      </div>
					    </div>
					  </div>
					  @endif
					@if ($element->type=="diameter")
					    <div class="col-sm-6 col-md-4">

					    <div class="thumbnail">
					      <img src="/images/{{$element->id}}.jpg" class="img-circle">
					      <div class="caption">
					        <h4>{{$element->name}}</h4>

					     <div class="radio">
					  		<label><input id="a1" type="radio" name="optradio1" value="{{$element->id}}"></label>
						</div>

					      </div>
					    </div>
					  </div>
					  @endif
			@endforeach		  
	@endif

		@if ($i==1)  		
			@foreach ($elements as $element)
			 @if ($element->type=="stuffing")
					  		 <div class="col-sm-6 col-md-4">

					    <div class="thumbnail">
					      <img src="/images/{{$element->id}}.jpg" class="img-circle">
					      <div class="caption">
					        <h4>{{$element->name}}</h4>

					     <div class="radio">
					  		<input type="checkbox" name="optradio2" value="{{$element->id}}">
						</div>

					      </div>
					    </div>
					  </div>
					  @endif
					  @endforeach
				@endif


					@if ($i==2)  		
			@foreach ($elements as $element)
			 @if ($element->type=="addition")
					  		 <div class="col-sm-6 col-md-4">

					    <div class="thumbnail">
					      <img src="/images/{{$element->id}}.jpg" class="img-circle">
					      <div class="caption">
					        <h4>{{$element->name}}</h4>

					     <div class="radio">
					  		<input type="checkbox" name="optradio3" value="{{$element->id}}">
						</div>

					      </div>
					    </div>
					  </div>
					  @endif
					  @endforeach
				@endif



						
	 <button id="next{{$i}}" class="btn btn-lg btn-warning" type="button">Продолжить</button>
			</div>	 
			@endfor 	


  <script src="/js/pizza.js"></script> <!-- наш скриптик-обработчик -->

	
				  </div>
				 
			</div>
	    </div>
	</section>
@stop