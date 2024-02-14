@extends('layouts.logind')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            background: #95a5a6;
            background-image: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_embroidery.png);
            font-family: 'Helvetica Neue', Arial, Sans-Serif;
        }

        html .login-wrap {
            top: 50%;
            left: 50%;
            position: absolute;
            margin: 0 auto;
            background: #ecf0f1;
            width: 350px;
            border-radius: 5px;
            box-shadow: 3px 3px 10px #333;
            padding: 15px;
            transform: translate(-50%, -50%);
        }

        html .login-wrap h2 {
            text-align: center;
            font-weight: 200;
            font-size: 2em;
            margin-top: 10px;
            color: #34495e;
        }

        html .login-wrap .form {
            padding-top: 20px;
        }

        html .login-wrap .form input[type="text"],
        html .login-wrap .form input[type="email"],
        html .login-wrap .form input[type="password"],
        html .login-wrap .form button {
            width: 80%;
            margin-left: 10%;
            margin-bottom: 25px;
            height: 40px;
            border-radius: 5px;
            outline: 0;
            -moz-outline-style: none;
        }

        html .login-wrap .form input[type="text"],
        html .login-wrap .form input[type="email"],
        html .login-wrap .form input[type="password"] {
            border: 1px solid #bbb;
            padding: 0 0 0 10px;
            font-size: 14px;
        }

        html .login-wrap .form input[type="text"]:focus,
        html .login-wrap .form input[type="email"]:focus,
        html .login-wrap .form input[type="password"]:focus {
            border: 1px solid #3498db;
        }

        html .login-wrap .form a {
            text-align: center;
            font-size: 15px;
            color: #3498db;
            background-color: #611BBD;
            border-color: #130269;


        }

        html .login-wrap .form a p {

            padding-bottom: 10px;
        }

        html .login-wrap .form button {
            background: #e74c3c;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: 200;
            cursor: pointer;
            transition: box-shadow .4s ease;
        }


        .secondary {
            background: #aba7a4;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: 200;
            cursor: pointer;
            transition: box-shadow .4s ease;
        }

        .secondary:hover {
            box-shadow: 1px 1px 5px #555;
        }

        .secondary:active {
            box-shadow: 1px 1px 5px #555;
        }

        html .login-wrap .form button:hover {
            box-shadow: 1px 1px 5px #555;
        }

        html .login-wrap .form button:active {
            box-shadow: 1px 1px 7px #222;
        }

        html .login-wrap:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background: -webkit-linear-gradient(left, #27ae60 0%, #27ae60 20%, #8e44ad 20%, #8e44ad 40%, #3498db 40%, #3498db 60%, #e74c3c 60%, #e74c3c 80%, #f1c40f 80%, #f1c40f 100%);
            background: -moz-linear-gradient(left, #27ae60 0%, #27ae60 20%, #8e44ad 20%, #8e44ad 40%, #3498db 40%, #3498db 60%, #e74c3c 60%, #e74c3c 80%, #f1c40f 80%, #f1c40f 100%);
            height: 5px;
            border-radius: 5px 5px 0 0;
        }


        html {
            height: 100%;
            background: radial-gradient(ellipse at bottom, #1b2735 0%, #090a0f 100%);
            overflow: hidden;
        }

        #stars {
            width: 1px;
            height: 1px;
            background: transparent;
            box-shadow: 775px 1869px #FFF, 1296px 357px #FFF, 1553px 1925px #FFF, 544px 1541px #FFF, 1364px 351px #FFF, 591px 1285px #FFF, 1228px 1334px #FFF, 918px 130px #FFF, 384px 1253px #FFF, 982px 1102px #FFF, 720px 204px #FFF, 1489px 145px #FFF, 510px 1394px #FFF, 1306px 359px #FFF, 1508px 1435px #FFF, 142px 1156px #FFF, 1013px 1912px #FFF, 1014px 45px #FFF, 1086px 494px #FFF, 1955px 617px #FFF, 912px 484px #FFF, 771px 899px #FFF, 1891px 1616px #FFF, 1949px 23px #FFF, 35px 285px #FFF, 785px 523px #FFF, 92px 1514px #FFF, 295px 462px #FFF, 1315px 742px #FFF, 379px 1487px #FFF, 1574px 1555px #FFF, 1789px 212px #FFF, 965px 1530px #FFF, 1377px 821px #FFF, 1436px 1573px #FFF, 1619px 1746px #FFF, 626px 1357px #FFF, 841px 1576px #FFF, 787px 913px #FFF, 789px 716px #FFF, 477px 646px #FFF, 1839px 1463px #FFF, 1103px 1882px #FFF, 937px 1454px #FFF, 843px 1328px #FFF, 982px 585px #FFF, 872px 483px #FFF, 1343px 1175px #FFF, 1604px 972px #FFF, 289px 840px #FFF, 1992px 411px #FFF, 753px 735px #FFF, 985px 619px #FFF, 590px 1707px #FFF, 1470px 1279px #FFF, 1723px 277px #FFF, 122px 1785px #FFF, 821px 1321px #FFF, 935px 410px #FFF, 1120px 101px #FFF, 896px 1442px #FFF, 824px 1521px #FFF, 641px 1661px #FFF, 771px 1234px #FFF, 735px 1371px #FFF, 875px 1432px #FFF, 1288px 1851px #FFF, 1154px 882px #FFF, 579px 121px #FFF, 338px 1401px #FFF, 1138px 739px #FFF, 1145px 120px #FFF, 637px 1854px #FFF, 1929px 760px #FFF, 398px 1735px #FFF, 1670px 1990px #FFF, 1995px 244px #FFF, 1956px 1252px #FFF, 1385px 413px #FFF, 37px 1696px #FFF, 99px 1532px #FFF, 1844px 1715px #FFF, 1992px 1269px #FFF, 339px 1906px #FFF, 538px 60px #FFF, 790px 1637px #FFF, 1791px 1780px #FFF, 1924px 1211px #FFF, 1116px 785px #FFF, 63px 399px #FFF, 1079px 1770px #FFF, 748px 254px #FFF, 1561px 1445px #FFF, 1561px 797px #FFF, 1171px 1289px #FFF, 1624px 1628px #FFF, 1609px 27px #FFF, 559px 1049px #FFF, 239px 1344px #FFF, 1886px 262px #FFF, 1837px 350px #FFF, 9px 738px #FFF, 1694px 1583px #FFF, 207px 48px #FFF, 141px 725px #FFF, 279px 13px #FFF, 1118px 1014px #FFF, 814px 649px #FFF, 1535px 823px #FFF, 1390px 1369px #FFF, 1826px 1257px #FFF, 315px 391px #FFF, 215px 319px #FFF, 744px 983px #FFF, 1039px 6px #FFF, 1217px 203px #FFF, 292px 1446px #FFF, 201px 1777px #FFF, 1951px 425px #FFF, 999px 1523px #FFF, 504px 39px #FFF, 1926px 1216px #FFF, 1505px 1465px #FFF, 1728px 1692px #FFF, 265px 518px #FFF, 1563px 79px #FFF, 1511px 823px #FFF, 975px 718px #FFF, 294px 1819px #FFF, 1174px 1928px #FFF, 1298px 1951px #FFF, 34px 1310px #FFF, 32px 1544px #FFF, 1537px 213px #FFF, 263px 286px #FFF, 1872px 976px #FFF, 435px 881px #FFF, 694px 935px #FFF, 770px 1884px #FFF, 1827px 242px #FFF, 112px 1198px #FFF, 594px 1607px #FFF, 1485px 1531px #FFF, 1397px 502px #FFF, 1272px 998px #FFF, 149px 138px #FFF, 770px 1010px #FFF, 491px 166px #FFF, 1576px 1098px #FFF, 179px 901px #FFF, 1845px 1163px #FFF, 423px 976px #FFF, 1625px 1473px #FFF, 1742px 1542px #FFF, 608px 853px #FFF, 1718px 148px #FFF, 1178px 816px #FFF, 1914px 419px #FFF, 1463px 249px #FFF, 362px 285px #FFF, 1313px 1081px #FFF, 1672px 1361px #FFF, 478px 489px #FFF, 1413px 1031px #FFF, 1648px 1452px #FFF, 1760px 366px #FFF, 314px 613px #FFF, 1112px 678px #FFF, 411px 1588px #FFF, 99px 1250px #FFF, 1896px 1886px #FFF, 1386px 1691px #FFF, 1389px 827px #FFF, 483px 164px #FFF, 731px 1287px #FFF, 1792px 1975px #FFF, 1312px 102px #FFF, 857px 1867px #FFF, 1501px 952px #FFF, 1368px 1444px #FFF, 354px 1329px #FFF, 24px 1711px #FFF, 760px 564px #FFF, 743px 1829px #FFF, 1976px 233px #FFF, 679px 371px #FFF, 302px 1124px #FFF, 287px 332px #FFF, 779px 1793px #FFF, 843px 202px #FFF, 1384px 133px #FFF, 356px 448px #FFF, 670px 234px #FFF, 1903px 617px #FFF, 143px 40px #FFF, 1015px 1802px #FFF, 1929px 720px #FFF, 125px 1113px #FFF, 791px 1724px #FFF, 126px 545px #FFF, 196px 160px #FFF, 1395px 684px #FFF, 1939px 1729px #FFF, 1693px 144px #FFF, 733px 1410px #FFF, 1778px 1245px #FFF, 1328px 778px #FFF, 1648px 1059px #FFF, 1748px 1334px #FFF, 1977px 1366px #FFF, 685px 1613px #FFF, 1466px 156px #FFF, 696px 364px #FFF, 599px 695px #FFF, 156px 1501px #FFF, 1609px 438px #FFF, 1999px 233px #FFF, 389px 241px #FFF, 399px 1803px #FFF, 1688px 1112px #FFF, 1076px 1745px #FFF, 195px 653px #FFF, 985px 1294px #FFF, 205px 29px #FFF, 374px 1957px #FFF, 125px 483px #FFF, 1222px 267px #FFF, 1527px 1680px #FFF, 902px 1715px #FFF, 302px 291px #FFF, 1798px 1343px #FFF, 1890px 849px #FFF, 821px 541px #FFF, 838px 200px #FFF, 1811px 522px #FFF, 1135px 287px #FFF, 97px 1262px #FFF, 645px 1551px #FFF, 1204px 352px #FFF, 546px 429px #FFF, 1908px 1557px #FFF, 1979px 15px #FFF, 845px 1538px #FFF, 135px 1109px #FFF, 1607px 813px #FFF, 552px 761px #FFF, 1495px 1774px #FFF, 1781px 1407px #FFF, 173px 319px #FFF, 1310px 1562px #FFF, 1484px 1414px #FFF, 779px 795px #FFF, 1607px 1115px #FFF, 994px 860px #FFF, 1121px 1715px #FFF, 1320px 710px #FFF, 1750px 1860px #FFF, 881px 1272px #FFF, 940px 1906px #FFF, 57px 559px #FFF, 30px 1277px #FFF, 691px 288px #FFF, 963px 911px #FFF, 1349px 1763px #FFF, 109px 1891px #FFF, 1341px 1749px #FFF, 1336px 1043px #FFF, 331px 289px #FFF, 1011px 1882px #FFF, 659px 1647px #FFF, 1128px 880px #FFF, 1597px 1364px #FFF, 1187px 514px #FFF, 164px 718px #FFF, 1892px 216px #FFF, 1350px 1084px #FFF, 1383px 163px #FFF, 1085px 1053px #FFF, 1307px 1392px #FFF, 1840px 1801px #FFF, 1160px 1225px #FFF, 484px 1900px #FFF, 1619px 67px #FFF, 990px 1053px #FFF, 741px 764px #FFF, 321px 211px #FFF, 1845px 1808px #FFF, 201px 882px #FFF, 1964px 520px #FFF, 998px 775px #FFF, 176px 1005px #FFF, 971px 1036px #FFF, 1940px 443px #FFF, 1539px 1264px #FFF, 1294px 1406px #FFF, 238px 1923px #FFF, 1058px 26px #FFF, 1858px 1936px #FFF, 967px 1783px #FFF, 637px 1627px #FFF, 743px 709px #FFF, 998px 1175px #FFF, 310px 914px #FFF, 1397px 1106px #FFF, 1054px 1486px #FFF, 611px 1892px #FFF, 371px 1177px #FFF, 44px 684px #FFF, 1295px 1788px #FFF, 1074px 1665px #FFF, 1114px 219px #FFF, 791px 1024px #FFF, 623px 694px #FFF, 928px 1073px #FFF, 850px 992px #FFF, 865px 42px #FFF, 1222px 1520px #FFF, 1394px 1022px #FFF, 1350px 1877px #FFF, 488px 1228px #FFF, 23px 1040px #FFF, 1931px 1113px #FFF, 1276px 1389px #FFF, 1526px 850px #FFF, 1085px 1695px #FFF, 639px 115px #FFF, 920px 742px #FFF, 1433px 210px #FFF, 861px 1506px #FFF, 1142px 1790px #FFF, 1382px 633px #FFF, 399px 1103px #FFF, 1038px 1566px #FFF, 324px 1110px #FFF, 819px 76px #FFF, 772px 1641px #FFF, 192px 1668px #FFF, 1250px 1859px #FFF, 991px 1411px #FFF, 305px 230px #FFF, 1292px 265px #FFF, 730px 946px #FFF, 1739px 1116px #FFF, 941px 749px #FFF, 1007px 176px #FFF, 299px 534px #FFF, 248px 1117px #FFF, 52px 880px #FFF, 1612px 1956px #FFF, 1051px 1415px #FFF, 960px 100px #FFF, 824px 1440px #FFF, 1709px 954px #FFF, 1101px 1120px #FFF, 578px 535px #FFF, 1817px 1968px #FFF, 136px 269px #FFF, 1695px 822px #FFF, 1300px 214px #FFF, 1808px 1296px #FFF, 1160px 923px #FFF, 1093px 697px #FFF, 1867px 1367px #FFF, 1557px 1394px #FFF, 1723px 1826px #FFF, 704px 229px #FFF, 1961px 1295px #FFF, 1077px 421px #FFF, 75px 1522px #FFF, 1781px 192px #FFF, 1662px 1587px #FFF, 601px 1989px #FFF, 980px 1845px #FFF, 1736px 868px #FFF, 681px 135px #FFF, 86px 1767px #FFF, 1898px 1818px #FFF, 333px 585px #FFF, 415px 1782px #FFF, 1687px 287px #FFF, 733px 1481px #FFF, 1647px 881px #FFF, 1241px 672px #FFF, 1993px 1537px #FFF, 1105px 1962px #FFF, 1237px 637px #FFF, 1580px 257px #FFF, 428px 300px #FFF, 273px 794px #FFF, 342px 1744px #FFF, 1871px 644px #FFF, 1122px 1852px #FFF, 544px 505px #FFF, 565px 113px #FFF, 1295px 1840px #FFF, 1276px 1268px #FFF, 593px 314px #FFF, 1040px 1170px #FFF, 769px 168px #FFF, 412px 327px #FFF, 1620px 769px #FFF, 1023px 136px #FFF, 1635px 1378px #FFF, 779px 1849px #FFF, 516px 1588px #FFF, 878px 1359px #FFF, 916px 565px #FFF, 254px 1011px #FFF, 1614px 112px #FFF, 1160px 1885px #FFF, 301px 463px #FFF, 334px 1519px #FFF, 1035px 1283px #FFF, 450px 1128px #FFF, 299px 976px #FFF, 1591px 1335px #FFF, 998px 110px #FFF, 546px 522px #FFF, 506px 1068px #FFF, 1361px 262px #FFF, 1881px 455px #FFF, 1147px 328px #FFF, 440px 897px #FFF, 1701px 1163px #FFF, 521px 1248px #FFF, 219px 1029px #FFF, 702px 1564px #FFF, 1603px 956px #FFF, 1997px 1159px #FFF, 929px 622px #FFF, 538px 1100px #FFF, 156px 1242px #FFF, 1261px 1307px #FFF, 1975px 1690px #FFF, 185px 942px #FFF, 773px 1367px #FFF, 1498px 1859px #FFF, 1571px 1953px #FFF, 1184px 947px #FFF, 1860px 1548px #FFF, 307px 183px #FFF, 1905px 746px #FFF, 1351px 351px #FFF, 1265px 1273px #FFF, 327px 428px #FFF, 10px 1928px #FFF, 1611px 23px #FFF, 676px 802px #FFF, 1784px 133px #FFF, 282px 510px #FFF, 457px 1879px #FFF, 1954px 352px #FFF, 1438px 1452px #FFF, 1090px 1932px #FFF, 497px 789px #FFF, 624px 364px #FFF, 1647px 960px #FFF, 819px 1538px #FFF, 719px 1319px #FFF, 479px 1318px #FFF, 796px 460px #FFF, 586px 565px #FFF, 1994px 443px #FFF, 1782px 682px #FFF, 1300px 1352px #FFF, 1155px 298px #FFF, 1642px 1580px #FFF, 1086px 369px #FFF, 953px 323px #FFF, 397px 1132px #FFF, 1951px 1581px #FFF, 1386px 268px #FFF, 1003px 935px #FFF, 1710px 1905px #FFF, 1290px 156px #FFF, 358px 397px #FFF, 446px 714px #FFF, 457px 1027px #FFF, 807px 1383px #FFF, 1457px 1624px #FFF, 432px 633px #FFF, 1075px 215px #FFF, 30px 999px #FFF, 1719px 944px #FFF, 1569px 1597px #FFF, 607px 1974px #FFF, 473px 1923px #FFF, 362px 1146px #FFF, 683px 1299px #FFF, 1678px 356px #FFF, 312px 992px #FFF, 1363px 179px #FFF, 669px 951px #FFF, 440px 1012px #FFF, 766px 288px #FFF, 675px 773px #FFF, 612px 929px #FFF, 6px 810px #FFF, 714px 1886px #FFF, 608px 35px #FFF, 1172px 622px #FFF, 358px 523px #FFF, 1429px 25px #FFF, 1357px 980px #FFF, 1446px 323px #FFF, 435px 1973px #FFF, 371px 1893px #FFF, 526px 346px #FFF, 1065px 1373px #FFF, 396px 1372px #FFF, 761px 1570px #FFF, 1833px 216px #FFF, 1273px 1593px #FFF, 682px 157px #FFF, 772px 1295px #FFF, 1233px 1470px #FFF, 650px 1205px #FFF, 1954px 1169px #FFF, 1248px 642px #FFF, 1381px 1822px #FFF, 1421px 1344px #FFF, 236px 726px #FFF, 68px 1471px #FFF, 1402px 1519px #FFF, 1686px 1539px #FFF, 1257px 1146px #FFF, 1299px 660px #FFF, 1385px 256px #FFF, 1658px 134px #FFF, 441px 846px #FFF, 29px 943px #FFF, 206px 1016px #FFF, 715px 1394px #FFF, 893px 1231px #FFF, 698px 190px #FFF, 1141px 189px #FFF, 665px 771px #FFF, 220px 1892px #FFF, 1974px 149px #FFF, 551px 1977px #FFF, 1015px 452px #FFF, 644px 1576px #FFF, 649px 1120px #FFF, 1901px 1171px #FFF, 485px 1599px #FFF, 1297px 317px #FFF, 761px 1592px #FFF, 339px 15px #FFF, 1907px 191px #FFF, 1372px 570px #FFF, 1904px 848px #FFF, 1731px 1958px #FFF, 1856px 474px #FFF, 283px 1908px #FFF, 1183px 1080px #FFF, 1092px 120px #FFF, 307px 1832px #FFF, 1412px 1108px #FFF, 766px 78px #FFF, 1197px 183px #FFF, 973px 424px #FFF, 1088px 1321px #FFF, 369px 1557px #FFF, 40px 1002px #FFF, 32px 543px #FFF, 355px 1332px #FFF, 492px 1384px #FFF, 721px 69px #FFF, 1412px 792px #FFF, 891px 1730px #FFF, 533px 1925px #FFF, 1110px 201px #FFF, 1789px 1043px #FFF, 1706px 796px #FFF, 1092px 1479px #FFF, 739px 719px #FFF, 215px 595px #FFF, 1430px 897px #FFF, 1858px 574px #FFF, 879px 979px #FFF, 98px 1974px #FFF, 1545px 1661px #FFF, 320px 255px #FFF, 1393px 235px #FFF, 1053px 611px #FFF, 1253px 1516px #FFF, 246px 1207px #FFF, 537px 1232px #FFF, 382px 1784px #FFF, 1593px 970px #FFF, 500px 1878px #FFF, 976px 842px #FFF, 1358px 1082px #FFF, 1389px 1363px #FFF, 879px 1753px #FFF, 698px 235px #FFF, 155px 648px #FFF, 170px 983px #FFF, 1525px 1185px #FFF, 927px 1686px #FFF, 407px 150px #FFF, 1600px 1746px #FFF, 1555px 173px #FFF, 962px 1334px #FFF, 1690px 1012px #FFF, 379px 1458px #FFF, 263px 1525px #FFF, 181px 704px #FFF, 1652px 1006px #FFF, 1205px 344px #FFF, 1826px 562px #FFF, 1252px 884px #FFF, 686px 1018px #FFF, 823px 1250px #FFF, 269px 388px #FFF, 216px 1975px #FFF, 215px 1733px #FFF, 66px 68px #FFF, 1908px 972px #FFF, 1779px 1206px #FFF, 1762px 1891px #FFF, 1283px 740px #FFF, 969px 682px #FFF, 199px 559px #FFF, 629px 1517px #FFF, 1552px 1201px #FFF, 889px 1940px #FFF, 129px 152px #FFF, 688px 697px #FFF, 1022px 1493px #FFF, 1822px 880px #FFF, 5px 866px #FFF, 1836px 1427px #FFF, 103px 1256px #FFF, 1157px 1090px #FFF, 962px 337px #FFF, 240px 340px #FFF, 174px 214px #FFF, 332px 1716px #FFF, 1354px 1613px #FFF, 1078px 1442px #FFF, 1032px 420px #FFF, 1767px 1175px #FFF, 1339px 1696px #FFF, 1742px 1804px #FFF, 282px 1789px #FFF, 1932px 604px #FFF, 796px 1040px #FFF, 570px 1206px #FFF, 158px 309px #FFF, 10px 689px #FFF, 1837px 1299px #FFF, 654px 1131px #FFF, 1863px 644px #FFF, 1624px 963px #FFF, 1467px 166px #FFF, 1114px 1045px #FFF, 6px 16px #FFF, 913px 152px #FFF, 946px 50px #FFF, 273px 826px #FFF, 1084px 20px #FFF, 1259px 1650px #FFF, 1768px 1829px #FFF, 1802px 1505px #FFF, 1406px 708px #FFF, 1511px 521px #FFF, 1908px 1845px #FFF, 1120px 993px #FFF, 1468px 794px #FFF, 1845px 230px #FFF, 123px 396px #FFF, 1992px 1267px #FFF, 933px 1746px #FFF, 524px 1904px #FFF, 353px 1754px #FFF, 669px 1672px #FFF, 1702px 751px #FFF, 1102px 26px #FFF, 991px 1878px #FFF, 1951px 695px #FFF, 863px 867px #FFF, 1571px 6px #FFF, 155px 611px #FFF, 278px 633px #FFF, 1304px 499px #FFF, 1400px 407px #FFF, 1224px 1995px #FFF, 895px 810px #FFF, 1577px 622px #FFF, 12px 987px #FFF, 1647px 822px #FFF, 545px 1445px #FFF, 816px 246px #FFF, 611px 503px #FFF, 1432px 1430px #FFF, 423px 669px #FFF, 208px 590px #FFF, 61px 567px #FFF, 234px 1399px #FFF;
            animation: animStar 50s linear infinite;
        }

        #stars:after {
            content: " ";
            position: absolute;
            top: 2000px;
            width: 1px;
            height: 1px;
            background: transparent;
            box-shadow: 775px 1869px #FFF, 1296px 357px #FFF, 1553px 1925px #FFF, 544px 1541px #FFF, 1364px 351px #FFF, 591px 1285px #FFF, 1228px 1334px #FFF, 918px 130px #FFF, 384px 1253px #FFF, 982px 1102px #FFF, 720px 204px #FFF, 1489px 145px #FFF, 510px 1394px #FFF, 1306px 359px #FFF, 1508px 1435px #FFF, 142px 1156px #FFF, 1013px 1912px #FFF, 1014px 45px #FFF, 1086px 494px #FFF, 1955px 617px #FFF, 912px 484px #FFF, 771px 899px #FFF, 1891px 1616px #FFF, 1949px 23px #FFF, 35px 285px #FFF, 785px 523px #FFF, 92px 1514px #FFF, 295px 462px #FFF, 1315px 742px #FFF, 379px 1487px #FFF, 1574px 1555px #FFF, 1789px 212px #FFF, 965px 1530px #FFF, 1377px 821px #FFF, 1436px 1573px #FFF, 1619px 1746px #FFF, 626px 1357px #FFF, 841px 1576px #FFF, 787px 913px #FFF, 789px 716px #FFF, 477px 646px #FFF, 1839px 1463px #FFF, 1103px 1882px #FFF, 937px 1454px #FFF, 843px 1328px #FFF, 982px 585px #FFF, 872px 483px #FFF, 1343px 1175px #FFF, 1604px 972px #FFF, 289px 840px #FFF, 1992px 411px #FFF, 753px 735px #FFF, 985px 619px #FFF, 590px 1707px #FFF, 1470px 1279px #FFF, 1723px 277px #FFF, 122px 1785px #FFF, 821px 1321px #FFF, 935px 410px #FFF, 1120px 101px #FFF, 896px 1442px #FFF, 824px 1521px #FFF, 641px 1661px #FFF, 771px 1234px #FFF, 735px 1371px #FFF, 875px 1432px #FFF, 1288px 1851px #FFF, 1154px 882px #FFF, 579px 121px #FFF, 338px 1401px #FFF, 1138px 739px #FFF, 1145px 120px #FFF, 637px 1854px #FFF, 1929px 760px #FFF, 398px 1735px #FFF, 1670px 1990px #FFF, 1995px 244px #FFF, 1956px 1252px #FFF, 1385px 413px #FFF, 37px 1696px #FFF, 99px 1532px #FFF, 1844px 1715px #FFF, 1992px 1269px #FFF, 339px 1906px #FFF, 538px 60px #FFF, 790px 1637px #FFF, 1791px 1780px #FFF, 1924px 1211px #FFF, 1116px 785px #FFF, 63px 399px #FFF, 1079px 1770px #FFF, 748px 254px #FFF, 1561px 1445px #FFF, 1561px 797px #FFF, 1171px 1289px #FFF, 1624px 1628px #FFF, 1609px 27px #FFF, 559px 1049px #FFF, 239px 1344px #FFF, 1886px 262px #FFF, 1837px 350px #FFF, 9px 738px #FFF, 1694px 1583px #FFF, 207px 48px #FFF, 141px 725px #FFF, 279px 13px #FFF, 1118px 1014px #FFF, 814px 649px #FFF, 1535px 823px #FFF, 1390px 1369px #FFF, 1826px 1257px #FFF, 315px 391px #FFF, 215px 319px #FFF, 744px 983px #FFF, 1039px 6px #FFF, 1217px 203px #FFF, 292px 1446px #FFF, 201px 1777px #FFF, 1951px 425px #FFF, 999px 1523px #FFF, 504px 39px #FFF, 1926px 1216px #FFF, 1505px 1465px #FFF, 1728px 1692px #FFF, 265px 518px #FFF, 1563px 79px #FFF, 1511px 823px #FFF, 975px 718px #FFF, 294px 1819px #FFF, 1174px 1928px #FFF, 1298px 1951px #FFF, 34px 1310px #FFF, 32px 1544px #FFF, 1537px 213px #FFF, 263px 286px #FFF, 1872px 976px #FFF, 435px 881px #FFF, 694px 935px #FFF, 770px 1884px #FFF, 1827px 242px #FFF, 112px 1198px #FFF, 594px 1607px #FFF, 1485px 1531px #FFF, 1397px 502px #FFF, 1272px 998px #FFF, 149px 138px #FFF, 770px 1010px #FFF, 491px 166px #FFF, 1576px 1098px #FFF, 179px 901px #FFF, 1845px 1163px #FFF, 423px 976px #FFF, 1625px 1473px #FFF, 1742px 1542px #FFF, 608px 853px #FFF, 1718px 148px #FFF, 1178px 816px #FFF, 1914px 419px #FFF, 1463px 249px #FFF, 362px 285px #FFF, 1313px 1081px #FFF, 1672px 1361px #FFF, 478px 489px #FFF, 1413px 1031px #FFF, 1648px 1452px #FFF, 1760px 366px #FFF, 314px 613px #FFF, 1112px 678px #FFF, 411px 1588px #FFF, 99px 1250px #FFF, 1896px 1886px #FFF, 1386px 1691px #FFF, 1389px 827px #FFF, 483px 164px #FFF, 731px 1287px #FFF, 1792px 1975px #FFF, 1312px 102px #FFF, 857px 1867px #FFF, 1501px 952px #FFF, 1368px 1444px #FFF, 354px 1329px #FFF, 24px 1711px #FFF, 760px 564px #FFF, 743px 1829px #FFF, 1976px 233px #FFF, 679px 371px #FFF, 302px 1124px #FFF, 287px 332px #FFF, 779px 1793px #FFF, 843px 202px #FFF, 1384px 133px #FFF, 356px 448px #FFF, 670px 234px #FFF, 1903px 617px #FFF, 143px 40px #FFF, 1015px 1802px #FFF, 1929px 720px #FFF, 125px 1113px #FFF, 791px 1724px #FFF, 126px 545px #FFF, 196px 160px #FFF, 1395px 684px #FFF, 1939px 1729px #FFF, 1693px 144px #FFF, 733px 1410px #FFF, 1778px 1245px #FFF, 1328px 778px #FFF, 1648px 1059px #FFF, 1748px 1334px #FFF, 1977px 1366px #FFF, 685px 1613px #FFF, 1466px 156px #FFF, 696px 364px #FFF, 599px 695px #FFF, 156px 1501px #FFF, 1609px 438px #FFF, 1999px 233px #FFF, 389px 241px #FFF, 399px 1803px #FFF, 1688px 1112px #FFF, 1076px 1745px #FFF, 195px 653px #FFF, 985px 1294px #FFF, 205px 29px #FFF, 374px 1957px #FFF, 125px 483px #FFF, 1222px 267px #FFF, 1527px 1680px #FFF, 902px 1715px #FFF, 302px 291px #FFF, 1798px 1343px #FFF, 1890px 849px #FFF, 821px 541px #FFF, 838px 200px #FFF, 1811px 522px #FFF, 1135px 287px #FFF, 97px 1262px #FFF, 645px 1551px #FFF, 1204px 352px #FFF, 546px 429px #FFF, 1908px 1557px #FFF, 1979px 15px #FFF, 845px 1538px #FFF, 135px 1109px #FFF, 1607px 813px #FFF, 552px 761px #FFF, 1495px 1774px #FFF, 1781px 1407px #FFF, 173px 319px #FFF, 1310px 1562px #FFF, 1484px 1414px #FFF, 779px 795px #FFF, 1607px 1115px #FFF, 994px 860px #FFF, 1121px 1715px #FFF, 1320px 710px #FFF, 1750px 1860px #FFF, 881px 1272px #FFF, 940px 1906px #FFF, 57px 559px #FFF, 30px 1277px #FFF, 691px 288px #FFF, 963px 911px #FFF, 1349px 1763px #FFF, 109px 1891px #FFF, 1341px 1749px #FFF, 1336px 1043px #FFF, 331px 289px #FFF, 1011px 1882px #FFF, 659px 1647px #FFF, 1128px 880px #FFF, 1597px 1364px #FFF, 1187px 514px #FFF, 164px 718px #FFF, 1892px 216px #FFF, 1350px 1084px #FFF, 1383px 163px #FFF, 1085px 1053px #FFF, 1307px 1392px #FFF, 1840px 1801px #FFF, 1160px 1225px #FFF, 484px 1900px #FFF, 1619px 67px #FFF, 990px 1053px #FFF, 741px 764px #FFF, 321px 211px #FFF, 1845px 1808px #FFF, 201px 882px #FFF, 1964px 520px #FFF, 998px 775px #FFF, 176px 1005px #FFF, 971px 1036px #FFF, 1940px 443px #FFF, 1539px 1264px #FFF, 1294px 1406px #FFF, 238px 1923px #FFF, 1058px 26px #FFF, 1858px 1936px #FFF, 967px 1783px #FFF, 637px 1627px #FFF, 743px 709px #FFF, 998px 1175px #FFF, 310px 914px #FFF, 1397px 1106px #FFF, 1054px 1486px #FFF, 611px 1892px #FFF, 371px 1177px #FFF, 44px 684px #FFF, 1295px 1788px #FFF, 1074px 1665px #FFF, 1114px 219px #FFF, 791px 1024px #FFF, 623px 694px #FFF, 928px 1073px #FFF, 850px 992px #FFF, 865px 42px #FFF, 1222px 1520px #FFF, 1394px 1022px #FFF, 1350px 1877px #FFF, 488px 1228px #FFF, 23px 1040px #FFF, 1931px 1113px #FFF, 1276px 1389px #FFF, 1526px 850px #FFF, 1085px 1695px #FFF, 639px 115px #FFF, 920px 742px #FFF, 1433px 210px #FFF, 861px 1506px #FFF, 1142px 1790px #FFF, 1382px 633px #FFF, 399px 1103px #FFF, 1038px 1566px #FFF, 324px 1110px #FFF, 819px 76px #FFF, 772px 1641px #FFF, 192px 1668px #FFF, 1250px 1859px #FFF, 991px 1411px #FFF, 305px 230px #FFF, 1292px 265px #FFF, 730px 946px #FFF, 1739px 1116px #FFF, 941px 749px #FFF, 1007px 176px #FFF, 299px 534px #FFF, 248px 1117px #FFF, 52px 880px #FFF, 1612px 1956px #FFF, 1051px 1415px #FFF, 960px 100px #FFF, 824px 1440px #FFF, 1709px 954px #FFF, 1101px 1120px #FFF, 578px 535px #FFF, 1817px 1968px #FFF, 136px 269px #FFF, 1695px 822px #FFF, 1300px 214px #FFF, 1808px 1296px #FFF, 1160px 923px #FFF, 1093px 697px #FFF, 1867px 1367px #FFF, 1557px 1394px #FFF, 1723px 1826px #FFF, 704px 229px #FFF, 1961px 1295px #FFF, 1077px 421px #FFF, 75px 1522px #FFF, 1781px 192px #FFF, 1662px 1587px #FFF, 601px 1989px #FFF, 980px 1845px #FFF, 1736px 868px #FFF, 681px 135px #FFF, 86px 1767px #FFF, 1898px 1818px #FFF, 333px 585px #FFF, 415px 1782px #FFF, 1687px 287px #FFF, 733px 1481px #FFF, 1647px 881px #FFF, 1241px 672px #FFF, 1993px 1537px #FFF, 1105px 1962px #FFF, 1237px 637px #FFF, 1580px 257px #FFF, 428px 300px #FFF, 273px 794px #FFF, 342px 1744px #FFF, 1871px 644px #FFF, 1122px 1852px #FFF, 544px 505px #FFF, 565px 113px #FFF, 1295px 1840px #FFF, 1276px 1268px #FFF, 593px 314px #FFF, 1040px 1170px #FFF, 769px 168px #FFF, 412px 327px #FFF, 1620px 769px #FFF, 1023px 136px #FFF, 1635px 1378px #FFF, 779px 1849px #FFF, 516px 1588px #FFF, 878px 1359px #FFF, 916px 565px #FFF, 254px 1011px #FFF, 1614px 112px #FFF, 1160px 1885px #FFF, 301px 463px #FFF, 334px 1519px #FFF, 1035px 1283px #FFF, 450px 1128px #FFF, 299px 976px #FFF, 1591px 1335px #FFF, 998px 110px #FFF, 546px 522px #FFF, 506px 1068px #FFF, 1361px 262px #FFF, 1881px 455px #FFF, 1147px 328px #FFF, 440px 897px #FFF, 1701px 1163px #FFF, 521px 1248px #FFF, 219px 1029px #FFF, 702px 1564px #FFF, 1603px 956px #FFF, 1997px 1159px #FFF, 929px 622px #FFF, 538px 1100px #FFF, 156px 1242px #FFF, 1261px 1307px #FFF, 1975px 1690px #FFF, 185px 942px #FFF, 773px 1367px #FFF, 1498px 1859px #FFF, 1571px 1953px #FFF, 1184px 947px #FFF, 1860px 1548px #FFF, 307px 183px #FFF, 1905px 746px #FFF, 1351px 351px #FFF, 1265px 1273px #FFF, 327px 428px #FFF, 10px 1928px #FFF, 1611px 23px #FFF, 676px 802px #FFF, 1784px 133px #FFF, 282px 510px #FFF, 457px 1879px #FFF, 1954px 352px #FFF, 1438px 1452px #FFF, 1090px 1932px #FFF, 497px 789px #FFF, 624px 364px #FFF, 1647px 960px #FFF, 819px 1538px #FFF, 719px 1319px #FFF, 479px 1318px #FFF, 796px 460px #FFF, 586px 565px #FFF, 1994px 443px #FFF, 1782px 682px #FFF, 1300px 1352px #FFF, 1155px 298px #FFF, 1642px 1580px #FFF, 1086px 369px #FFF, 953px 323px #FFF, 397px 1132px #FFF, 1951px 1581px #FFF, 1386px 268px #FFF, 1003px 935px #FFF, 1710px 1905px #FFF, 1290px 156px #FFF, 358px 397px #FFF, 446px 714px #FFF, 457px 1027px #FFF, 807px 1383px #FFF, 1457px 1624px #FFF, 432px 633px #FFF, 1075px 215px #FFF, 30px 999px #FFF, 1719px 944px #FFF, 1569px 1597px #FFF, 607px 1974px #FFF, 473px 1923px #FFF, 362px 1146px #FFF, 683px 1299px #FFF, 1678px 356px #FFF, 312px 992px #FFF, 1363px 179px #FFF, 669px 951px #FFF, 440px 1012px #FFF, 766px 288px #FFF, 675px 773px #FFF, 612px 929px #FFF, 6px 810px #FFF, 714px 1886px #FFF, 608px 35px #FFF, 1172px 622px #FFF, 358px 523px #FFF, 1429px 25px #FFF, 1357px 980px #FFF, 1446px 323px #FFF, 435px 1973px #FFF, 371px 1893px #FFF, 526px 346px #FFF, 1065px 1373px #FFF, 396px 1372px #FFF, 761px 1570px #FFF, 1833px 216px #FFF, 1273px 1593px #FFF, 682px 157px #FFF, 772px 1295px #FFF, 1233px 1470px #FFF, 650px 1205px #FFF, 1954px 1169px #FFF, 1248px 642px #FFF, 1381px 1822px #FFF, 1421px 1344px #FFF, 236px 726px #FFF, 68px 1471px #FFF, 1402px 1519px #FFF, 1686px 1539px #FFF, 1257px 1146px #FFF, 1299px 660px #FFF, 1385px 256px #FFF, 1658px 134px #FFF, 441px 846px #FFF, 29px 943px #FFF, 206px 1016px #FFF, 715px 1394px #FFF, 893px 1231px #FFF, 698px 190px #FFF, 1141px 189px #FFF, 665px 771px #FFF, 220px 1892px #FFF, 1974px 149px #FFF, 551px 1977px #FFF, 1015px 452px #FFF, 644px 1576px #FFF, 649px 1120px #FFF, 1901px 1171px #FFF, 485px 1599px #FFF, 1297px 317px #FFF, 761px 1592px #FFF, 339px 15px #FFF, 1907px 191px #FFF, 1372px 570px #FFF, 1904px 848px #FFF, 1731px 1958px #FFF, 1856px 474px #FFF, 283px 1908px #FFF, 1183px 1080px #FFF, 1092px 120px #FFF, 307px 1832px #FFF, 1412px 1108px #FFF, 766px 78px #FFF, 1197px 183px #FFF, 973px 424px #FFF, 1088px 1321px #FFF, 369px 1557px #FFF, 40px 1002px #FFF, 32px 543px #FFF, 355px 1332px #FFF, 492px 1384px #FFF, 721px 69px #FFF, 1412px 792px #FFF, 891px 1730px #FFF, 533px 1925px #FFF, 1110px 201px #FFF, 1789px 1043px #FFF, 1706px 796px #FFF, 1092px 1479px #FFF, 739px 719px #FFF, 215px 595px #FFF, 1430px 897px #FFF, 1858px 574px #FFF, 879px 979px #FFF, 98px 1974px #FFF, 1545px 1661px #FFF, 320px 255px #FFF, 1393px 235px #FFF, 1053px 611px #FFF, 1253px 1516px #FFF, 246px 1207px #FFF, 537px 1232px #FFF, 382px 1784px #FFF, 1593px 970px #FFF, 500px 1878px #FFF, 976px 842px #FFF, 1358px 1082px #FFF, 1389px 1363px #FFF, 879px 1753px #FFF, 698px 235px #FFF, 155px 648px #FFF, 170px 983px #FFF, 1525px 1185px #FFF, 927px 1686px #FFF, 407px 150px #FFF, 1600px 1746px #FFF, 1555px 173px #FFF, 962px 1334px #FFF, 1690px 1012px #FFF, 379px 1458px #FFF, 263px 1525px #FFF, 181px 704px #FFF, 1652px 1006px #FFF, 1205px 344px #FFF, 1826px 562px #FFF, 1252px 884px #FFF, 686px 1018px #FFF, 823px 1250px #FFF, 269px 388px #FFF, 216px 1975px #FFF, 215px 1733px #FFF, 66px 68px #FFF, 1908px 972px #FFF, 1779px 1206px #FFF, 1762px 1891px #FFF, 1283px 740px #FFF, 969px 682px #FFF, 199px 559px #FFF, 629px 1517px #FFF, 1552px 1201px #FFF, 889px 1940px #FFF, 129px 152px #FFF, 688px 697px #FFF, 1022px 1493px #FFF, 1822px 880px #FFF, 5px 866px #FFF, 1836px 1427px #FFF, 103px 1256px #FFF, 1157px 1090px #FFF, 962px 337px #FFF, 240px 340px #FFF, 174px 214px #FFF, 332px 1716px #FFF, 1354px 1613px #FFF, 1078px 1442px #FFF, 1032px 420px #FFF, 1767px 1175px #FFF, 1339px 1696px #FFF, 1742px 1804px #FFF, 282px 1789px #FFF, 1932px 604px #FFF, 796px 1040px #FFF, 570px 1206px #FFF, 158px 309px #FFF, 10px 689px #FFF, 1837px 1299px #FFF, 654px 1131px #FFF, 1863px 644px #FFF, 1624px 963px #FFF, 1467px 166px #FFF, 1114px 1045px #FFF, 6px 16px #FFF, 913px 152px #FFF, 946px 50px #FFF, 273px 826px #FFF, 1084px 20px #FFF, 1259px 1650px #FFF, 1768px 1829px #FFF, 1802px 1505px #FFF, 1406px 708px #FFF, 1511px 521px #FFF, 1908px 1845px #FFF, 1120px 993px #FFF, 1468px 794px #FFF, 1845px 230px #FFF, 123px 396px #FFF, 1992px 1267px #FFF, 933px 1746px #FFF, 524px 1904px #FFF, 353px 1754px #FFF, 669px 1672px #FFF, 1702px 751px #FFF, 1102px 26px #FFF, 991px 1878px #FFF, 1951px 695px #FFF, 863px 867px #FFF, 1571px 6px #FFF, 155px 611px #FFF, 278px 633px #FFF, 1304px 499px #FFF, 1400px 407px #FFF, 1224px 1995px #FFF, 895px 810px #FFF, 1577px 622px #FFF, 12px 987px #FFF, 1647px 822px #FFF, 545px 1445px #FFF, 816px 246px #FFF, 611px 503px #FFF, 1432px 1430px #FFF, 423px 669px #FFF, 208px 590px #FFF, 61px 567px #FFF, 234px 1399px #FFF;
        }

        #stars2 {
            width: 2px;
            height: 2px;
            background: transparent;
            box-shadow: 1983px 719px #FFF, 1577px 1472px #FFF, 1447px 281px #FFF, 954px 253px #FFF, 1788px 201px #FFF, 567px 1648px #FFF, 1078px 1765px #FFF, 571px 1578px #FFF, 1152px 528px #FFF, 732px 474px #FFF, 238px 974px #FFF, 476px 98px #FFF, 223px 1719px #FFF, 20px 667px #FFF, 1795px 956px #FFF, 1396px 1851px #FFF, 1066px 483px #FFF, 536px 1058px #FFF, 61px 1438px #FFF, 1106px 429px #FFF, 773px 420px #FFF, 894px 313px #FFF, 1291px 1452px #FFF, 51px 144px #FFF, 1253px 1566px #FFF, 1125px 1984px #FFF, 539px 1861px #FFF, 744px 1937px #FFF, 1144px 1723px #FFF, 806px 1000px #FFF, 502px 1316px #FFF, 779px 1039px #FFF, 257px 447px #FFF, 1944px 269px #FFF, 1450px 594px #FFF, 336px 1092px #FFF, 1206px 227px #FFF, 1099px 1175px #FFF, 85px 1673px #FFF, 391px 1933px #FFF, 1887px 1207px #FFF, 1653px 404px #FFF, 1274px 729px #FFF, 792px 874px #FFF, 74px 412px #FFF, 521px 1535px #FFF, 588px 1250px #FFF, 1035px 1497px #FFF, 1320px 1053px #FFF, 552px 1988px #FFF, 1305px 1475px #FFF, 508px 1689px #FFF, 1964px 1357px #FFF, 1095px 900px #FFF, 1903px 1777px #FFF, 409px 1623px #FFF, 564px 691px #FFF, 1608px 914px #FFF, 546px 1165px #FFF, 162px 279px #FFF, 1121px 1206px #FFF, 1804px 1981px #FFF, 1199px 1228px #FFF, 536px 1779px #FFF, 1645px 1604px #FFF, 1621px 1601px #FFF, 1956px 116px #FFF, 1215px 1131px #FFF, 1286px 1243px #FFF, 638px 844px #FFF, 1304px 948px #FFF, 1950px 703px #FFF, 151px 783px #FFF, 1462px 1376px #FFF, 1114px 609px #FFF, 930px 679px #FFF, 195px 1193px #FFF, 1948px 593px #FFF, 1808px 34px #FFF, 844px 1240px #FFF, 1268px 1140px #FFF, 965px 1493px #FFF, 19px 845px #FFF, 1434px 1898px #FFF, 1483px 1709px #FFF, 1227px 326px #FFF, 219px 629px #FFF, 1236px 249px #FFF, 1351px 1820px #FFF, 1880px 999px #FFF, 39px 584px #FFF, 1579px 347px #FFF, 109px 1216px #FFF, 1048px 1966px #FFF, 1593px 1236px #FFF, 1316px 1516px #FFF, 749px 1059px #FFF, 843px 1962px #FFF, 521px 1869px #FFF, 341px 1359px #FFF, 411px 610px #FFF, 1413px 1200px #FFF, 1245px 787px #FFF, 1726px 804px #FFF, 1050px 1052px #FFF, 251px 1937px #FFF, 1422px 712px #FFF, 1578px 713px #FFF, 1964px 1272px #FFF, 609px 78px #FFF, 369px 1372px #FFF, 642px 1373px #FFF, 151px 973px #FFF, 1591px 567px #FFF, 382px 1164px #FFF, 725px 1575px #FFF, 633px 982px #FFF, 964px 761px #FFF, 414px 1384px #FFF, 1678px 884px #FFF, 695px 1420px #FFF, 945px 1624px #FFF, 825px 460px #FFF, 1251px 1029px #FFF, 815px 437px #FFF, 72px 784px #FFF, 1551px 639px #FFF, 1925px 436px #FFF, 1835px 734px #FFF, 68px 1282px #FFF, 62px 1054px #FFF, 1335px 1889px #FFF, 1210px 1956px #FFF, 1892px 1997px #FFF, 1341px 1968px #FFF, 368px 836px #FFF, 860px 1323px #FFF, 1535px 1124px #FFF, 640px 744px #FFF, 1219px 1224px #FFF, 1432px 1917px #FFF, 205px 214px #FFF, 664px 648px #FFF, 506px 1227px #FFF, 664px 912px #FFF, 1852px 1367px #FFF, 1975px 573px #FFF, 736px 836px #FFF, 1746px 599px #FFF, 1335px 543px #FFF, 921px 1624px #FFF, 723px 253px #FFF, 766px 1299px #FFF, 1700px 51px #FFF, 869px 1294px #FFF, 875px 1611px #FFF, 1323px 1321px #FFF, 1576px 1018px #FFF, 511px 204px #FFF, 1756px 1394px #FFF, 957px 1280px #FFF, 1810px 1521px #FFF, 1393px 1590px #FFF, 1789px 797px #FFF, 499px 1761px #FFF, 855px 348px #FFF, 194px 1557px #FFF, 1181px 1125px #FFF, 1295px 972px #FFF, 508px 1718px #FFF, 142px 974px #FFF, 912px 704px #FFF, 1598px 585px #FFF, 1984px 312px #FFF, 625px 1171px #FFF, 1888px 405px #FFF, 1293px 1849px #FFF, 1282px 1980px #FFF, 915px 1207px #FFF, 1169px 1421px #FFF, 427px 1128px #FFF, 1634px 1877px #FFF, 454px 250px #FFF, 1612px 824px #FFF, 1642px 1667px #FFF, 1933px 309px #FFF, 1853px 1055px #FFF, 207px 849px #FFF, 221px 1145px #FFF, 646px 1391px #FFF, 1331px 1273px #FFF, 1976px 100px #FFF, 689px 1404px #FFF, 1786px 902px #FFF, 615px 1068px #FFF, 953px 816px #FFF, 107px 23px #FFF, 1712px 788px #FFF, 1278px 582px #FFF, 1737px 1605px #FFF;
            animation: animStar 100s linear infinite;
        }

        #stars2:after {
            content: " ";
            position: absolute;
            top: 2000px;
            width: 2px;
            height: 2px;
            background: transparent;
            box-shadow: 1983px 719px #FFF, 1577px 1472px #FFF, 1447px 281px #FFF, 954px 253px #FFF, 1788px 201px #FFF, 567px 1648px #FFF, 1078px 1765px #FFF, 571px 1578px #FFF, 1152px 528px #FFF, 732px 474px #FFF, 238px 974px #FFF, 476px 98px #FFF, 223px 1719px #FFF, 20px 667px #FFF, 1795px 956px #FFF, 1396px 1851px #FFF, 1066px 483px #FFF, 536px 1058px #FFF, 61px 1438px #FFF, 1106px 429px #FFF, 773px 420px #FFF, 894px 313px #FFF, 1291px 1452px #FFF, 51px 144px #FFF, 1253px 1566px #FFF, 1125px 1984px #FFF, 539px 1861px #FFF, 744px 1937px #FFF, 1144px 1723px #FFF, 806px 1000px #FFF, 502px 1316px #FFF, 779px 1039px #FFF, 257px 447px #FFF, 1944px 269px #FFF, 1450px 594px #FFF, 336px 1092px #FFF, 1206px 227px #FFF, 1099px 1175px #FFF, 85px 1673px #FFF, 391px 1933px #FFF, 1887px 1207px #FFF, 1653px 404px #FFF, 1274px 729px #FFF, 792px 874px #FFF, 74px 412px #FFF, 521px 1535px #FFF, 588px 1250px #FFF, 1035px 1497px #FFF, 1320px 1053px #FFF, 552px 1988px #FFF, 1305px 1475px #FFF, 508px 1689px #FFF, 1964px 1357px #FFF, 1095px 900px #FFF, 1903px 1777px #FFF, 409px 1623px #FFF, 564px 691px #FFF, 1608px 914px #FFF, 546px 1165px #FFF, 162px 279px #FFF, 1121px 1206px #FFF, 1804px 1981px #FFF, 1199px 1228px #FFF, 536px 1779px #FFF, 1645px 1604px #FFF, 1621px 1601px #FFF, 1956px 116px #FFF, 1215px 1131px #FFF, 1286px 1243px #FFF, 638px 844px #FFF, 1304px 948px #FFF, 1950px 703px #FFF, 151px 783px #FFF, 1462px 1376px #FFF, 1114px 609px #FFF, 930px 679px #FFF, 195px 1193px #FFF, 1948px 593px #FFF, 1808px 34px #FFF, 844px 1240px #FFF, 1268px 1140px #FFF, 965px 1493px #FFF, 19px 845px #FFF, 1434px 1898px #FFF, 1483px 1709px #FFF, 1227px 326px #FFF, 219px 629px #FFF, 1236px 249px #FFF, 1351px 1820px #FFF, 1880px 999px #FFF, 39px 584px #FFF, 1579px 347px #FFF, 109px 1216px #FFF, 1048px 1966px #FFF, 1593px 1236px #FFF, 1316px 1516px #FFF, 749px 1059px #FFF, 843px 1962px #FFF, 521px 1869px #FFF, 341px 1359px #FFF, 411px 610px #FFF, 1413px 1200px #FFF, 1245px 787px #FFF, 1726px 804px #FFF, 1050px 1052px #FFF, 251px 1937px #FFF, 1422px 712px #FFF, 1578px 713px #FFF, 1964px 1272px #FFF, 609px 78px #FFF, 369px 1372px #FFF, 642px 1373px #FFF, 151px 973px #FFF, 1591px 567px #FFF, 382px 1164px #FFF, 725px 1575px #FFF, 633px 982px #FFF, 964px 761px #FFF, 414px 1384px #FFF, 1678px 884px #FFF, 695px 1420px #FFF, 945px 1624px #FFF, 825px 460px #FFF, 1251px 1029px #FFF, 815px 437px #FFF, 72px 784px #FFF, 1551px 639px #FFF, 1925px 436px #FFF, 1835px 734px #FFF, 68px 1282px #FFF, 62px 1054px #FFF, 1335px 1889px #FFF, 1210px 1956px #FFF, 1892px 1997px #FFF, 1341px 1968px #FFF, 368px 836px #FFF, 860px 1323px #FFF, 1535px 1124px #FFF, 640px 744px #FFF, 1219px 1224px #FFF, 1432px 1917px #FFF, 205px 214px #FFF, 664px 648px #FFF, 506px 1227px #FFF, 664px 912px #FFF, 1852px 1367px #FFF, 1975px 573px #FFF, 736px 836px #FFF, 1746px 599px #FFF, 1335px 543px #FFF, 921px 1624px #FFF, 723px 253px #FFF, 766px 1299px #FFF, 1700px 51px #FFF, 869px 1294px #FFF, 875px 1611px #FFF, 1323px 1321px #FFF, 1576px 1018px #FFF, 511px 204px #FFF, 1756px 1394px #FFF, 957px 1280px #FFF, 1810px 1521px #FFF, 1393px 1590px #FFF, 1789px 797px #FFF, 499px 1761px #FFF, 855px 348px #FFF, 194px 1557px #FFF, 1181px 1125px #FFF, 1295px 972px #FFF, 508px 1718px #FFF, 142px 974px #FFF, 912px 704px #FFF, 1598px 585px #FFF, 1984px 312px #FFF, 625px 1171px #FFF, 1888px 405px #FFF, 1293px 1849px #FFF, 1282px 1980px #FFF, 915px 1207px #FFF, 1169px 1421px #FFF, 427px 1128px #FFF, 1634px 1877px #FFF, 454px 250px #FFF, 1612px 824px #FFF, 1642px 1667px #FFF, 1933px 309px #FFF, 1853px 1055px #FFF, 207px 849px #FFF, 221px 1145px #FFF, 646px 1391px #FFF, 1331px 1273px #FFF, 1976px 100px #FFF, 689px 1404px #FFF, 1786px 902px #FFF, 615px 1068px #FFF, 953px 816px #FFF, 107px 23px #FFF, 1712px 788px #FFF, 1278px 582px #FFF, 1737px 1605px #FFF;
        }

        #stars3 {
            width: 3px;
            height: 3px;
            background: transparent;
            box-shadow: 1229px 1022px #FFF, 898px 1280px #FFF, 1756px 1442px #FFF, 1656px 580px #FFF, 1492px 325px #FFF, 1276px 1229px #FFF, 1209px 1279px #FFF, 77px 862px #FFF, 288px 794px #FFF, 923px 554px #FFF, 1102px 1592px #FFF, 1102px 868px #FFF, 1946px 1256px #FFF, 384px 1210px #FFF, 258px 1480px #FFF, 701px 333px #FFF, 1480px 1287px #FFF, 267px 1357px #FFF, 1651px 1262px #FFF, 1718px 415px #FFF, 1913px 1175px #FFF, 417px 1970px #FFF, 895px 1720px #FFF, 1264px 991px #FFF, 890px 941px #FFF, 834px 124px #FFF, 12px 288px #FFF, 1649px 934px #FFF, 1582px 1173px #FFF, 1856px 1354px #FFF, 595px 131px #FFF, 1898px 1403px #FFF, 1297px 28px #FFF, 1233px 894px #FFF, 866px 754px #FFF, 1161px 458px #FFF, 1134px 1270px #FFF, 940px 955px #FFF, 1514px 1357px #FFF, 209px 1480px #FFF, 1195px 578px #FFF, 239px 278px #FFF, 1709px 1016px #FFF, 836px 1741px #FFF, 1545px 1235px #FFF, 1426px 1030px #FFF, 1381px 1728px #FFF, 1682px 1142px #FFF, 649px 487px #FFF, 1706px 1236px #FFF, 581px 617px #FFF, 990px 1039px #FFF, 1444px 821px #FFF, 1263px 1512px #FFF, 642px 1211px #FFF, 714px 1985px #FFF, 1166px 763px #FFF, 1628px 464px #FFF, 687px 1317px #FFF, 557px 1939px #FFF, 920px 1038px #FFF, 320px 1427px #FFF, 1235px 1919px #FFF, 1744px 53px #FFF, 1210px 132px #FFF, 1931px 736px #FFF, 432px 1261px #FFF, 483px 1833px #FFF, 1722px 87px #FFF, 382px 1359px #FFF, 1512px 1012px #FFF, 541px 838px #FFF, 695px 852px #FFF, 568px 1345px #FFF, 1067px 99px #FFF, 1006px 99px #FFF, 1908px 1535px #FFF, 248px 1922px #FFF, 478px 1724px #FFF, 529px 1729px #FFF, 288px 1393px #FFF, 1282px 534px #FFF, 790px 1248px #FFF, 940px 209px #FFF, 1604px 252px #FFF, 699px 1220px #FFF, 602px 880px #FFF, 1531px 578px #FFF, 1181px 967px #FFF, 1942px 1321px #FFF, 1740px 500px #FFF, 1820px 22px #FFF, 1189px 744px #FFF, 1189px 1748px #FFF, 1700px 1059px #FFF, 850px 59px #FFF, 626px 1380px #FFF, 1443px 1401px #FFF, 527px 907px #FFF, 497px 167px #FFF;
            animation: animStar 150s linear infinite;
        }

        #stars3:after {
            content: " ";
            position: absolute;
            top: 2000px;
            width: 3px;
            height: 3px;
            background: transparent;
            box-shadow: 1229px 1022px #FFF, 898px 1280px #FFF, 1756px 1442px #FFF, 1656px 580px #FFF, 1492px 325px #FFF, 1276px 1229px #FFF, 1209px 1279px #FFF, 77px 862px #FFF, 288px 794px #FFF, 923px 554px #FFF, 1102px 1592px #FFF, 1102px 868px #FFF, 1946px 1256px #FFF, 384px 1210px #FFF, 258px 1480px #FFF, 701px 333px #FFF, 1480px 1287px #FFF, 267px 1357px #FFF, 1651px 1262px #FFF, 1718px 415px #FFF, 1913px 1175px #FFF, 417px 1970px #FFF, 895px 1720px #FFF, 1264px 991px #FFF, 890px 941px #FFF, 834px 124px #FFF, 12px 288px #FFF, 1649px 934px #FFF, 1582px 1173px #FFF, 1856px 1354px #FFF, 595px 131px #FFF, 1898px 1403px #FFF, 1297px 28px #FFF, 1233px 894px #FFF, 866px 754px #FFF, 1161px 458px #FFF, 1134px 1270px #FFF, 940px 955px #FFF, 1514px 1357px #FFF, 209px 1480px #FFF, 1195px 578px #FFF, 239px 278px #FFF, 1709px 1016px #FFF, 836px 1741px #FFF, 1545px 1235px #FFF, 1426px 1030px #FFF, 1381px 1728px #FFF, 1682px 1142px #FFF, 649px 487px #FFF, 1706px 1236px #FFF, 581px 617px #FFF, 990px 1039px #FFF, 1444px 821px #FFF, 1263px 1512px #FFF, 642px 1211px #FFF, 714px 1985px #FFF, 1166px 763px #FFF, 1628px 464px #FFF, 687px 1317px #FFF, 557px 1939px #FFF, 920px 1038px #FFF, 320px 1427px #FFF, 1235px 1919px #FFF, 1744px 53px #FFF, 1210px 132px #FFF, 1931px 736px #FFF, 432px 1261px #FFF, 483px 1833px #FFF, 1722px 87px #FFF, 382px 1359px #FFF, 1512px 1012px #FFF, 541px 838px #FFF, 695px 852px #FFF, 568px 1345px #FFF, 1067px 99px #FFF, 1006px 99px #FFF, 1908px 1535px #FFF, 248px 1922px #FFF, 478px 1724px #FFF, 529px 1729px #FFF, 288px 1393px #FFF, 1282px 534px #FFF, 790px 1248px #FFF, 940px 209px #FFF, 1604px 252px #FFF, 699px 1220px #FFF, 602px 880px #FFF, 1531px 578px #FFF, 1181px 967px #FFF, 1942px 1321px #FFF, 1740px 500px #FFF, 1820px 22px #FFF, 1189px 744px #FFF, 1189px 1748px #FFF, 1700px 1059px #FFF, 850px 59px #FFF, 626px 1380px #FFF, 1443px 1401px #FFF, 527px 907px #FFF, 497px 167px #FFF;
        }

        #title {
            position: absolute;
            top: 20%;
            left: 0;
            right: 0;
            color: #FFF;
            text-align: center;
            font-family: "lato", sans-serif;
            font-weight: 300;
            font-size: 50px;
            letter-spacing: 10px;
            margin-top: -60px;
            padding-left: 10px;
        }

        #title span {
            background: -webkit-linear-gradient(white, #38495a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        @keyframes animStar {
            from {
                transform: translateY(0px);
            }

            to {
                transform: translateY(-2000px);
            }
        }



        .btn-google,
        .btn-fb {
            display: inline-block;
            border-radius: 1px;
            text-decoration: none;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
            transition: background-color 0.218s, border-color 0.218s, box-shadow 0.218s;
        }

        .btn-google .google-content,
        .btn-google .fb-content,
        .btn-fb .google-content,
        .btn-fb .fb-content {
            display: flex;
            align-items: center;
            width: 320px;
            height: 50px;
        }

        .btn-google .google-content .logo,
        .btn-google .fb-content .logo,
        .btn-fb .google-content .logo,
        .btn-fb .fb-content .logo {
            padding: 15px;
            height: inherit;
        }

        .btn-google .google-content svg,
        .btn-google .fb-content svg,
        .btn-fb .google-content svg,
        .btn-fb .fb-content svg {
            width: 18px;
            height: 18px;
        }

        .btn-google .google-content p,
        .btn-google .fb-content p,
        .btn-fb .google-content p,
        .btn-fb .fb-content p {
            width: 100%;
            line-height: 1;
            letter-spacing: 0.21px;
            text-align: center;
            font-weight: 500;
            font-family: "Roboto", sans-serif;
        }

        .btn-google {
            background: #FFF;
        }

        .btn-google:hover {
            box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
        }

        .btn-google:active {
            background-color: #eee;
        }

        .btn-google .google-content p {
            color: #757575;
        }

        .btn-fb {
            padding-top: 1.5px;
            background: #4267b2;
            background-color: #3b5998;
        }

        .btn-fb:hover {
            box-shadow: 0 0 3px 3px rgba(59, 89, 152, 0.3);
        }

        .btn-fb .fb-content p {
            color: rgba(255, 255, 255, 0.87);
        }
    </style>

    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>

    <div id='title'>


        <span>
            SABONG PHIL
        </span>
    </div>

    <div class="login-wrap">
        <h2>Login</h2>




        <div class="form">

            <form method="POST" action="{{ route('login') }}">
                @csrf


                {{-- <input type="text" placeholder="Username" name="un" /> --}}

                <input id="email" type="email" placeholder="Email"
                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>





                {{-- <input type="password" placeholder="Password" name="pw" /> --}}

                <input id="password" placeholder="Password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">


                {{-- <button> Sign in </button> --}}

                <button type="submit">
                    {{ __('Login') }}
                </button>

                @error('email')
                    <small class="invalid-feedback" style="text-align: center !important;color: red;" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror


                @error('password')
                    <small class="invalid-feedback" style="text-align: center !important;color: red;" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror


                <hr>

        </div>
        {{-- <h5 style="text-align:center">OR</h5> --}}
        {{-- <br> --}}


        <!-- google	 -->
        {{-- <div>
            <a class="btn-google" href="{{ route('google-auth') }}">
                <div class="google-content">
                    <div class="logo">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 48 48">
                            <defs>
                                <path id="a"
                                    d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                            </defs>
                            <clipPath id="b">
                                <use xlink:href="#a" overflow="visible" />
                            </clipPath>
                            <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                            <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                            <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                            <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                        </svg>
                    </div>
                    <p>Sign in with Google</p>
                </div>
            </a>
        </div>
        <br> --}}
        {{-- <!-- facebook	 -->
        <div>
            <a class="btn-fb" href="">
                <div class="fb-content">
                    <div class="logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            version="1">
                            <path fill="#FFFFFF"
                                d="M32 30a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v28z" />
                            <path fill="#4267b2"
                                d="M22 32V20h4l1-5h-5v-2c0-2 1.002-3 3-3h2V5h-4c-3.675 0-6 2.881-6 7v3h-4v5h4v12h5z" />
                        </svg>
                    </div>
                    <p>Sign in with Facebook</p>
                </div>
            </a>
        </div> --}}
        </form>



        <br>
        <a href="/register" class="btn btn-success">
            <p> Don't have an account? Register </p>
        </a>

    </div>
@endsection
