<html>
    <head>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

     <style>
         body{
             font-family: 'Tajawal', sans-serif;
                 font-size: 3rem;

         }
       table.table.table-hover.local-cur {
    width: 100%;
}
table.table.table-hover.local-cur tr td , table.table.table-hover.local-cur tr th {
  text-align: start;
    font-size: 3rem;
    border-bottom: solid 1px #ccc;
    padding: 10px;
}
img.cur-flag {
    width: 100px;
}


span.cur-ramz strong {
    font-size: 27px;
    color: green;
}
strong.price-strong {
    width: 100%;
    text-align: end;
    float: right;
}
</style>
    </head>
    <body >

        <?php
            $lang  = isset($_GET['lang']) ? $_GET['lang']:"en";
            \Illuminate\Support\Facades\App::setLocale($lang);
           ?>



        <div style=" text-align: center;
    max-width: 1200px;


    margin: 0 auto;
    ">

            <div style="background: url({{url('assets/images/cover.jpg')}});
                 color: #fff;padding: 2rem;">

                <h3> <?php if($lang == 'en') {echo "Terms and Conditions";} else {echo "الشروط والأحكام";}?></h3>
                <p><?php if($lang == 'en') {echo "sab_test Wallet app";} else {echo "تطبيق محفظة سبائك";}?></p>

            </div>
              <p>
                <?php $data=\App\Models\AppSetting::where('code', '=', 'terms_conditions')->first();
              if($lang == 'en'){  echo $data->contents_en;} else{ echo $data->contents_ar;}
               ?>
              {{-- sab_test Wallet app is an app provided by sab_test LLC as one of its digital utilities in the financial field.
              sab_test Wallet is the first app from sab_test IT department and it will be followed later by sab_test Trade ,sab_test stocks and sab_test Eco.
              This app is intended to help users find the best strategy to manage their spending  , with monthly and daily chart.
              It also has self advising system to locate any financial extra expenses and reduce them. --}}




            </p>
            {{-- <p>
                <?php if($lang == 'en') {echo "For any extra infomation, feel free to contact us on our dedicated email";} else {echo "لأي معلومات إضافية، لا تتردد في الاتصال بنا على البريد الإلكتروني المخصص لدينا";}?>
                 <br /> sab_test-wallet@sabaeyk.net</p> --}}

          </div>












    </body>


</html>
