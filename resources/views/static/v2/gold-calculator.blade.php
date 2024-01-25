<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>sab_test | Gold Calculator</title>
<link rel="icon" type="image/x-icon" href="{{asset("assets/img/favicon/favicon.png")}}" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>

   <?php
   $lang  = isset($_GET['lang']) ? $_GET['lang']:"en";
   \Illuminate\Support\Facades\App::setLocale($lang);
  ?>


<div class="container">
    <div class="p-5 my-4  rounded-3" style="background-color: #503211">
        <h3 style="color: white; text-align: center;">

         <?php if($lang == 'en') {echo "Gold Weight Converter";}
         else {echo "تحويل وزن الذهب";}?>



        </h3>
        <hr style="color: white;">
        <p class="lead" style="color: white; text-align: center;">


         <?php if($lang == 'en') {echo "This calculator provides an approximate value for the amount of pure gold with other units";}
         else {echo "تقدم هذه الحاسبة قيمةً تقريبيةً لكمية الذهب الخالص بالواحدات الأخرى";}?>


        </p>
    </div>
    <div>


            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">



                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0"> <?php if($lang == 'en') {echo "Input";}
                        else {echo "الإدخال";}?></h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <input id="gold_input_1" type="number" class="form-control" value="0" style="text-align: center; margin-bottom: 20px;" />
                            <select id="gold_select_1" name="" class="form-control" required style="text-align: center">
                              {{-- <option value="" disabled selected style="display:none">Select Unit</option> --}}
                              <option value="gram"><?php if($lang == 'en') {echo "Gram";}
                                 else {echo "غرام";}?></option>
                              <option value="kilogram"><?php if($lang == 'en') {echo "Kilo Gram";}
                                 else {echo "كيلو غرام";}?></option>
                              <option value="pound"><?php if($lang == 'en') {echo "Pound";}
                                 else {echo "باوند";}?></option>
                              <option value="ounce"><?php if($lang == 'en') {echo "Ounce";}
                                 else {echo "أونصة";}?></option>
                            </select>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>



                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0"><?php if($lang == 'en') {echo "Result";}
                        else {echo "النتيجة";}?></h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                              {{-- <input id="gold_input_2" type="number" class="form-control" value="0" style="text-align: center" /> --}}
                              <p id="gold_input_2" class="form-control"
                              style="text-align: center;
                              border: none;
                              font-weight: bold;
                              color: green;
                              font-size: 1.3rem;"> 0</p>
                                <select id="gold_select_2" name="" class="form-control" required style="text-align: center">
                                  {{-- <option value="" disabled selected style="display:none">Select Unit</option> --}}
                                  <option value="gram"><?php if($lang == 'en') {echo "Gram";}
                                    else {echo "غرام";}?></option>
                                 <option value="kilogram"><?php if($lang == 'en') {echo "Kilo Gram";}
                                    else {echo "كيلو غرام";}?></option>
                                 <option value="pound"><?php if($lang == 'en') {echo "Pound";}
                                    else {echo "باوند";}?></option>
                                 <option value="ounce"><?php if($lang == 'en') {echo "Ounce";}
                                    else {echo "أونصة";}?></option>
                                 </select>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>



              </div>
            </div>





    </div>


    <!--<hr  style="margin-top: 50px">-->
    <!--<footer>-->
    <!--    <div class="row">-->
    <!--        <div class="" style="text-align: center">-->
    <!--            <p>Copyright &copy; 2023 sab_test</p>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</footer>-->
</div>




{{-- <script>

    var el = document.getElementById("gold_select_1");
    el.addEventListener("change", function() {



      if (this.value == "gram") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.001 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 0.00220462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 0.035274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (this.value == "kilogram") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 1000 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 2.20462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 35.274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (this.value == "pound") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 453.592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.453592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 16 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (this.value == "ounce") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 28.3495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.0283495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 0.0625 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }


    }, false);

</script>

<script>
    document.getElementById("gold_input_1").oninput = function() {
        if (document.getElementById("gold_select_1").value == "gram") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.001 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 0.00220462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 0.035274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (document.getElementById("gold_select_1").value == "kilogram") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 1000 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 2.20462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 35.274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (document.getElementById("gold_select_1").value == "pound") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 453.592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.453592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 16 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (document.getElementById("gold_select_1").value == "ounce") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 28.3495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.0283495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 0.0625 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }
    };
</script> --}}
{{-- -----------------------Up working well --}}
{{-- <script>

    var el = document.getElementById("gold_select_2");
    el.addEventListener("change", function() {



      if (this.value == "gram") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 0.001 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 0.00220462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 0.035274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (this.value == "kilogram") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 1000 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 2.20462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 35.274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (this.value == "pound") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 453.592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 0.453592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 16 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }

     else if (this.value == "ounce") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 28.3495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 0.0283495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 0.0625 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").setAttribute("value", f);}
     }


    }, false);

</script>

<script>
    document.getElementById("gold_input_2").oninput = function() {
        if (document.getElementById("gold_select_2").value == "gram") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 1 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 0.001 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 0.00220462 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 0.035274 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}
     }

     else if (document.getElementById("gold_select_2").value == "kilogram") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 1000 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 1 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 2.20462 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 35.274 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}
     }

     else if (document.getElementById("gold_select_2").value == "pound") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 453.592 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 0.453592 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 1 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 16 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}
     }

     else if (document.getElementById("gold_select_2").value == "ounce") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 28.3495 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 0.0283495 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 0.0625 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 1 * document.getElementById("gold_input_2").value;
        document.getElementById("gold_input_1").setAttribute("value", f);}
     }
    };
</script> --}}




<script>

    var el = document.getElementById("gold_select_1");
    el.addEventListener("change", function() {



      if (this.value == "gram") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.001 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 0.00220462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 0.035274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (this.value == "kilogram") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 1000 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 2.20462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 35.274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (this.value == "pound") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 453.592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.453592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 16 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (this.value == "ounce") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 28.3495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.0283495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 0.0625 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }


    }, false);

</script>

<script>
    document.getElementById("gold_input_1").oninput = function() {
        if (document.getElementById("gold_select_1").value == "gram") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.001 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 0.00220462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 0.035274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (document.getElementById("gold_select_1").value == "kilogram") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 1000 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 2.20462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 35.274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (document.getElementById("gold_select_1").value == "pound") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 453.592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.453592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 16 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (document.getElementById("gold_select_1").value == "ounce") {
        if (document.getElementById("gold_select_2").value == "gram"){
        var f = 28.3495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "kilogram"){
        var f = 0.0283495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "pound"){
        var f = 0.0625 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_2").value == "ounce"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }
    };
</script>



<script>

    var el = document.getElementById("gold_select_2");
    el.addEventListener("change", function() {



      if (this.value == "gram") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 1000 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 453.592 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 28.3495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (this.value == "kilogram") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 0.001 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 0.453592* document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 0.0283495 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (this.value == "pound") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 0.00220462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 2.20462 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 0.0625 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }

     else if (this.value == "ounce") {
        if (document.getElementById("gold_select_1").value == "gram"){
        var f = 0.035274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "kilogram"){
        var f = 35.274 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "pound"){
        var f = 16 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}

        else if (document.getElementById("gold_select_1").value == "ounce"){
        var f = 1 * document.getElementById("gold_input_1").value;
        document.getElementById("gold_input_2").innerHTML = f;}
     }


    }, false);

</script>




</body>
</html>
