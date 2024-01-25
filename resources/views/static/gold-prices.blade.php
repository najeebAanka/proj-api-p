<html>
<?php use Carbon\Carbon; ?>

<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background: #000;
            color: #fff
        }

        #main-table tr td,
        #main-table tr th {
            border: solid 1px #ffc107;
            padding: 10px;
            font-size: 1rem;
            text-align: center;
        }
    </style>
</head>

<body>



    <div
        style=" text-align: center;
    max-width: 1200px;
  
    padding: 1rem;
    width: 100%;
    margin: 0 auto;
    ">
        <img style="    margin: 0 auto;
    max-width: 18rem;
    margin-top: 2rem;"
            src="{{ url('assets/images/logo.png') }}" />
        <?php if(isset($_GET['country'])){
        $lang      = isset($_GET['lang']) ? $_GET['lang']:"en";
        \Illuminate\Support\Facades\App::setLocale($lang);
        $country = \App\Models\Country::find($_GET['country']);
       ?>

        <h2 style="font-size: 60px;"> {{ __('app.gold-price-in') }} {{ $country['name_' . $lang] }} </h2>
        <?php if($lang == 'en'){?>
        <p style="font-size: 40px;">
            {{ __('app.gold-price-paragraph') }}
        </p>
        <?php }elseif($lang == 'ar'){?>
            <p style="font-size: 40px; direction:rtl;">
                {{ __('app.gold-price-paragraph') }}
            </p>
<?php }?>



        <table id="main-table" align="center" cellpadding="4" cellspacing="1" class="prices-table" width="100%">

            <head>
                <tr id="tab-head" style="    background-color: #eec374;">
                    <th style="font-size: 50px;"><?php if ($lang == 'en') {
                        echo 'Unit';
                    } else {
                        echo 'الواحدة';
                    } ?></th>
                    <th style="font-size: 50px;"><?php if ($lang == 'en') {
                        echo 'Price';
                    } else {
                        echo 'السعر';
                    } ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $data=\App\Models\GoldPrice::where('country_id', $_GET['country'])->whereDate('created_at', Carbon::today())->get();
                    if(count($data) > 0){
                        if($lang == "en"){
                       foreach ($data as $d) {
                        ?>
                    <tr>
                        <td style="font-size: 50px;"><?php $dat = \App\Models\GoldUnit::find($d->unit_id);
                        // $s = 'name_' . $lang;
                        echo $dat->name_en; ?></td>

                        <td style="font-size: 50px;"><?php $da = \App\Models\Country::find($d->country_id);
                        // $ss = 'currency_' . $lang;
                        echo $d->amount . ' ' . $da->currency_en; ?></td>
                    </tr>
                    <?php 
                    }}elseif($lang == "ar"){  foreach ($data as $d) {?>
                    
                    <tr>
                        <td style="direction: rtl;font-size: 50px;"><?php $dat = \App\Models\GoldUnit::find($d->unit_id);
                        // $s = 'name_' . $lang;
                        echo $dat->name_ar; ?></td>

                        <td style="direction: rtl;font-size: 50px;"><?php $da = \App\Models\Country::find($d->country_id);
                        // $ss = 'currency_' . $lang;
                        echo $d->amount . ' ' . $da->currency_ar    ; ?></td>
                    </tr>
                    
                  <?php } }}else{?>

                    <tr>
                        <td style="    font-size: 60px; color: #c9892b;" colspan="100%"><?php if ($lang == 'en') {
                            echo 'No updates for today';
                        } else {
                            echo 'لا يوجد تحديثات لهذا اليوم';
                        } ?></td>
                    </tr>
                    <script>
                        document.getElementById('tab-head').innerHTML = "";
                    </script>

                    <?php
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><img style="width: 100%;" src="{{ url('assets/images/table.jpg') }}" /></td>
                    </tr>
                    {{-- <tr>


                        <td colspan="3">

                            <?php if ($lang == 'en') {
                                echo "The latest update of gold prices today in Sudan is on Wednesday, January 04,
                                                                                    2023 08:46 AM, Sudan time";
                            } else {
                                echo "آخر تحديث لأسعار الذهب اليوم في السودان ليوم الأربعاء 04 يناير
                                                                                    2023 ، 08:46 صباحًا بتوقيت السودان";
                            } ?>

                        </td>
                    </tr> --}}
                </tfoot>
        </table>


        <?php }else{ ?>
        <p>Country not selected</p>
        <p>You cant view anything unless you select a country first</p>

        <?php } ?>
    </div>




    <script>
        var myHeaders = new Headers();
        myHeaders.append("x-access-token", "goldapi-17s5tlca58gfh-io");
        myHeaders.append("Content-Type", "application/json");

        var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };

        //fetch("https://www.goldapi.io/api/XAU/USD", requestOptions)
        //  .then(response => response.text())
        //  .then(result => console.log(result))
        //  .catch(error => console.log('error', error));
    </script>

</body>


</html>
