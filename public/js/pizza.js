$(document).ready(function () {
      //увы, одной функцией ограничится не получится. т.к. все radio и checkbox находятся в HTML СРАЗУ, и переход на след. этап- это всего лишь скрытие
    //одного блока и показ другого блока. Так что вот 3 разные функции. Не очень изящно, но вполне работоспособно.
    
    $('#next0').click(function() { //клик на кнопку "продолжить" на этапе выбора теста и радиуса для пиццы
      var arr=[0, 0];

        

     
             arr[0] = $("input[name=optradio]:checked").val(); //получаем ID элементов...
             arr[1] = $("input[name=optradio1]:checked").val(); //лежащих в VALUE отмеченных radio button. 


            
        if (arr[0]==null || arr[1]==null)
        {
            alert("Кажется вы кое что пропустили :)"); //собственно обработчик события когда пользователь не выбрал ничего. 


            throw new Error("stop");  //к чему грузить ajaxом сервер если входные данные не верны верно?
        }




        $.ajax({ // AJAX функция
            url: "/check", 
            type: "post",
            data: {fields: arr},
            success: function(data) { //в случае успеха:
                console.log(data); //log в консоли я оставляю, думаю Вам будет интересно посмотреть как оно выглядит изнутри. 

                $("#one").toggleClass("hidden"); //скрываем блок этапа выбора теста и радиуса.
                $("#two").removeClass("hidden"); //показывает блок выбора начинки.

                    var pr=$('#price').html(); 
                    pr=pr+data[2]; //добавляем суммарную цену в скрытый (ПОКА ЧТО) блок. Его мы показжем на последнем этапе.

                $('#price').html(pr);
                $('#nam').append(data[0].name, "<br>", data[1].name, "<br>"); // тоже в скрытый блок добавляем NAME элементов. 

            },
            error: function(data) {
                 console.log(0); //если на сервере ошибка
            }
        });
   
    });


//дальше мы идем по тому

       $('#next1').click(function() {

      
        


                 var arr=$("input[name='optradio2']:checked").map(function() {return this.value;}).get();
    console.log(arr); 
                
            

            if (arr.length==0)
        {
            alert("Выберите хоть что-нибудь :)");

            throw new Error("stop");
        }



        $.ajax({
            url: "/check",
            type: "post",
            data: {fields: arr},
            success: function(data) {
                console.log(data);

                $("#two").toggleClass("hidden");
                $("#three").removeClass("hidden");

                var pr=$('#price').html();
                    pr=parseInt(pr)+parseInt(data[data.length-1]);

                $('#price').html(pr);

                for (var i = 0; i < data.length; i++) {
                  $('#nam').append(data[i].name, "<br>");
                };
               
            },
            error: function(data) {
                 console.log(0);
            }
        });
        // return false;
   
    });

        $('#next2').click(function() {

      
        


                 var arr=$("input[name='optradio3']:checked").map(function() {return this.value;}).get();
    console.log(arr); 
                
            
            if (arr.length==0)
        {
            alert("Выберите хоть что-нибудь :)");

            throw new Error("stop");
        }


        $.ajax({
            url: "/check",
            type: "post",
            data: {fields: arr},
            success: function(data) {
                console.log(data);

                $("#three").toggleClass("hidden");
                $("#four").removeClass("hidden");

                var pr=$('#price').html();
                    pr=parseInt(pr)+parseInt(data[data.length-1]);

                $('#price').html(pr);

                for (var i = 0; i < data.length; i++) {
                  $('#nam').append(data[i].name, "<br>");
                };
            },
            error: function(data) {
                 console.log(0);
            }
        });
        // return false;
   
    });

 $('#next3').click(function() {
    var arr=$("input[name='optradio']:checked").map(function() {return this.value;}).get();
    var arr1=$("input[name='optradio1']:checked").map(function() {return this.value;}).get();
    arr=$.merge(arr, arr1);
    console.log(arr);
    $('#nam').append(arr);
  });

});


