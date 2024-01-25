<html>

<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            font-size: 3rem;

        }

        table.table.table-hover.local-cur {
            width: 100%;
        }

        table.table.table-hover.local-cur tr td,
        table.table.table-hover.local-cur tr th {
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

<body>


    <?php
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
    \Illuminate\Support\Facades\App::setLocale($lang);
    ?>


    <div style=" text-align: center;
    max-width: 1200px;
    margin: 0 auto;">

        <div style="background: url({{ url('assets/images/cover.jpg') }});
                 color: #fff;padding: 2rem;">

            <h3><?php if ($lang == 'en') {
                echo 'Convert currencies against the Sudanese pound';
            } else {
                echo 'تحويل العملات أمام الجنيه السوداني';
            } ?></h3>
            <p><?php if ($lang == 'en') {
                echo 'The exchange rate of the Sudanese pound against Arab and international currencies';
            } else {
                echo 'سعر صرف الجنيه السوداني أمام العملات العربية و العالمية';
            } ?></p>

        </div>

        <table class="table table-hover local-cur" style="margin-bottom: 2rem;">

            <tbody>

                <?php if ($lang == 'ar'){ ?>
                <tr>
                    <td style="direction: rtl"><strong class="price-strong" data-code="USD">6350</strong></td>
                    <td></td>
                    <th style="direction: rtl">
                        <img src="https://sp-today.com/images/flags/usd.png" class="cur-flag">
                        <span>دولار أمريكي</span><span class="cur-ramz"> <strong>(USD)</strong>:</span>
                    </th>
                </tr>

                <tr>
                    <td style="direction: rtl"><strong class="price-strong" data-code="EUR">6811</strong></td>
                    <td></td>
                    <th style="direction: rtl">
                        <img src="https://sp-today.com/images/flags/eur.png" class="cur-flag">
                        <span>يورو</span><span class="cur-ramz"> <strong>(EUR)</strong>:</span>
                    </th>
                </tr>

                <tr>
                    <td style="direction: rtl"><strong class="price-strong" data-code="EGP">227</strong></td>
                    <td></td>
                    <th style="direction: rtl">
                        <img src="https://sp-today.com/images/flags/egp.png" class="cur-flag">
                        <span>جنيه مصري</span><span class="cur-ramz"> <strong>(EGP)</strong>:</span>
                    </th>
                </tr>

                <tr>
                    <td style="direction: rtl"><strong class="price-strong" data-code="SAR">1691</strong></td>
                    <td></td>
                    <th style="direction: rtl">
                        <img src="https://sp-today.com/images/flags/sar.png" class="cur-flag">
                        <span>ريال سعودي</span><span class="cur-ramz"> <strong>(SAR)</strong>:</span>
                    </th>
                </tr>

                <tr>
                    <td style="direction: rtl"><strong class="price-strong" data-code="AED">1726</strong></td>
                    <td></td>
                    <th style="direction: rtl">
                        <img src="https://sp-today.com/images/flags/aed.png" class="cur-flag">
                        <span>درهم إماراتي</span><span class="cur-ramz"> <strong>(AED)</strong>:</span>
                    </th>
                </tr>

                <tr>
                    <td style="direction: rtl"><strong class="price-strong" data-code="GBP">7710</strong></td>
                    <td></td>
                    <th style="direction: rtl">
                        <img src="https://sp-today.com/images/flags/gbp.png" class="cur-flag">
                        <span>جنيه إسترليني</span><span class="cur-ramz"> <strong>(GBP)</strong>:</span>
                    </th>
                </tr>

                <tr>
                    <td style="direction: rtl"><strong class="price-strong" data-code="QAR">1740</strong></td>
                    <td></td>
                    <th style="direction: rtl">
                        <img src="https://sp-today.com/images/flags/qar.png" class="cur-flag">
                        <span>ريال قطري</span><span class="cur-ramz"> <strong>(QAR)</strong>:</span>
                    </th>
                </tr>

                <tr>
                    <td style="direction: rtl"><strong class="price-strong" data-code="BHD">16849</strong></td>
                    <td></td>
                    <th style="direction: rtl">
                        <img src="https://sp-today.com/images/flags/bhd.png" class="cur-flag">
                        <span>دينار بحريني</span><span class="cur-ramz"> <strong>(BHD)</strong>:</span>
                    </th>
                </tr>
                
                <?php }elseif ($lang == 'en') { ?>
                <tr>
                    <th>
                        <img src="https://sp-today.com/images/flags/usd.png" class="cur-flag">
                        <span>US Dollar</span><span class="cur-ramz"> <strong>(USD)</strong>:</span>
                    </th>
                    <td></td>
                    <td><strong class="price-strong" data-code="USD">6350</strong></td>
                </tr>

                <tr>
                    <th>
                        <img src="https://sp-today.com/images/flags/eur.png" class="cur-flag">
                        <span>Euro</span><span class="cur-ramz"> <strong>(EUR)</strong>:</span>
                    </th>
                    <td></td>
                    <td><strong class="price-strong" data-code="EUR">6811</strong></td>
                </tr>

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/try.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Turkish Lira';
                } else {
                    echo 'ليرة تركية';
                } ?></span><span class="cur-ramz"> <strong>(TRY)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong  class="price-strong" data-code="TRY">336</strong></td>-->
                <!--</tr>-->

                <tr>
                    <th>
                        <img src="https://sp-today.com/images/flags/egp.png" class="cur-flag">
                        <span>Egyptian Pound</span><span class="cur-ramz"> <strong>(EGP)</strong>:</span>
                    </th>
                    <td></td>
                    <td><strong class="price-strong" data-code="EGP">227</strong></td>
                </tr>

                <tr>
                    <th>
                        <img src="https://sp-today.com/images/flags/sar.png" class="cur-flag">
                        <span>Saudi Riyal</span><span class="cur-ramz"> <strong>(SAR)</strong>:</span>
                    </th>
                    <td></td>
                    <td><strong class="price-strong" data-code="SAR">1691</strong></td>
                </tr>

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/jod.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Jordanian Dinar';
                } else {
                    echo 'دينار أردني';
                } ?></span><span class="cur-ramz"> <strong>(JOD)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong  class="price-strong" data-code="JOD">8937</strong></td>-->
                <!--</tr>-->

                <tr>
                    <th>
                        <img src="https://sp-today.com/images/flags/aed.png" class="cur-flag">
                        <span>Emirate Dirham</span><span class="cur-ramz"> <strong>(AED)</strong>:</span>
                    </th>
                    <td></td>
                    <td><strong class="price-strong" data-code="AED">1726</strong></td>
                </tr>

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/lyd.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Libyan Dinar';
                } else {
                    echo 'دينار ليبي';
                } ?></span><span class="cur-ramz"> <strong>(LYD)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong  class="price-strong" data-code="LYD">1317</strong></td>-->
                <!--</tr>-->

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/kwd.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Kuwaiti Dinar';
                } else {
                    echo 'دينار كويتي';
                } ?></span><span class="cur-ramz"> <strong>(KWD)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong  class="price-strong" data-code="KWD">20726</strong></td>-->
                <!--</tr>-->

                <tr>
                    <th>
                        <img src="https://sp-today.com/images/flags/gbp.png" class="cur-flag">
                        <span>British Pound</span><span class="cur-ramz"> <strong>(GBP)</strong>:</span>
                    </th>
                    <td></td>
                    <td><strong class="price-strong" data-code="GBP">7710</strong></td>
                </tr>

                <tr>
                    <th>
                        <img src="https://sp-today.com/images/flags/qar.png" class="cur-flag">
                        <span>Qatari Riyal</span><span class="cur-ramz"> <strong>(QAR)</strong>:</span>
                    </th>
                    <td></td>
                    <td><strong class="price-strong" data-code="QAR">1740</strong></td>
                </tr>

                <tr>
                    <th>
                        <img src="https://sp-today.com/images/flags/bhd.png" class="cur-flag">
                        <span>Bahraini Dinar</span><span class="cur-ramz"> <strong>(BHD)</strong>:</span>
                    </th>
                    <td></td>
                    <td><strong class="price-strong" data-code="BHD">16849</strong></td>
                </tr>

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/sek.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Swedish Krona';
                } else {
                    echo 'كرون سويدي';
                } ?></span><span class="cur-ramz"> <strong>(SEK)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong  class="price-strong" data-code="SEK">610</strong></td>-->
                <!--</tr>-->

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/cad.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Canadian Dollar';
                } else {
                    echo 'دولار كندي';
                } ?></span><span class="cur-ramz"> <strong>(CAD)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong  class="price-strong" data-code="CAD">4733</strong></td>-->
                <!--</tr>-->

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/omr.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Omani Riyal';
                } else {
                    echo 'ريال عماني';
                } ?></span><span class="cur-ramz"> <strong>(OMR)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong  class="price-strong" data-code="OMR">16537</strong></td>-->
                <!--</tr>-->

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/nok.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Norwegian Krone';
                } else {
                    echo 'كرون نرويجي';
                } ?></span><span class="cur-ramz"> <strong>(NOK)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong  class="price-strong" data-code="NOK">637</strong></td>-->
                <!--</tr>-->

                <!--<tr>-->
                <!--<th>-->
                <!--<img src="https://sp-today.com/images/flags/dkk.png" class="cur-flag">-->
                <!--<span><?php if ($lang == 'en') {
                    echo 'Danish Krone';
                } else {
                    echo 'كرون دنماركي';
                } ?></span><span class="cur-ramz"> <strong>(DKK)</strong>:</span>-->
                <!--</th>-->
                <!--<td></td>-->
                <!--<td><strong class="price-strong" data-code="DKK"> 914</strong></td>-->
                <!--</tr>-->

                <?php } ?>

            </tbody>
        </table>

    </div>











    <script>
        fetch('https://api.exchangerate-api.com/v4/latest/SDG', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(response => {

                let data = response.rates;
                let squares = document.getElementsByClassName('price-strong');
                for (var i = 0; i < squares.length; i++) {
                    let s = squares[i];
                    let code = s.getAttribute('data-code');
                    console.log("code  : " + code)

                    s.innerHTML = (1 / parseFloat(data[code])).toFixed(2);
                }



            })
    </script>

</body>


</html>
