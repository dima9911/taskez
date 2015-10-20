<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex() //думаю отсюда и...
 	{
		return View::make('index');
	}

		public function getMenu()
	{
		return View::make('menu');
	}

		public function getPizza()
	{

		return View::make('pizza'); //...досюда вам все понятно. 
	}

	public function postCheck() //функция вызываемая ajax'ом. метод POST - не позволит пользователю получить к нему доступ напрямую (localhost/check)
	{

	 	$arr = Input::get("fields"); // получаем массив ID элементов лежащих в value выбранных radio/checkbox.

		for ($i=0; $i<count($arr); $i++) 
	 	{
	 		$elem[$i]=Element::find($arr[$i]); //по ID получаем массив Элементов пиццы. 
	 	}

	 	$res=0;

	 	for ($j=0; $j < count($elem) ; $j++) 
	 	{ 

	 		if ($elem[$j]->type=="dough") //первый этап отличается от других: необходимо умножение относительной цены толщины теста на радиус. 
	 		{
	 			$elem[count($elem)]=$elem[$j]->price*$elem[$j+1]->price; //в последний элемент массива ставим суммарную цену

	 			return $elem; //отдаем на вьюху массив Элементов и суммарную цену указанную в последнем элементе массива (можно и в отдельной переменной но так изящнее на мой взгляд)

	 		}
	 		else
	 		{
	 			$res+=$elem[$j]->price; //все остальные этапы одинаковы. плюсуем в последний элемент массива цену Элементов. 
	 		}
	 		
	 		

	 	}

	 	$elem[count($elem)]=$res;
	 	return $elem; //и отдаем массив Элементов с сумарной ценной на последнем элементе массива


	 	
	}


}
