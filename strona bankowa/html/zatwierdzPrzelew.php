<?php

    session_start();


    if(!isset($_SESSION['logged']) && !isset($_POST['amount'])) {
        header('Location: index.php');
        exit();
    }

    if(isset($_SESSION['logged']) && !isset($_POST['amount'])) {
        header('Location: home.php');
        exit();
    }

    if(floatval($_POST['amount']) > 0) {

    }
    else {
        $_SESSION['error_kwota'] = "Kwota nie może być równa 00.00 lub 0";
        header('Location: formPay.php');
        exit();
    }

    $_SESSION['P_toAccount']    = $_POST['toAccount'];
    $_SESSION['P_amount']       = $_POST['amount'];
    $_SESSION['P_nazw_odb']     = $_POST['nazw_odb'];
    $_SESSION['P_tytul']        = $_POST['title'];
    $_SESSION['P_data']         = date("Y-m-d H:i:s");


?>
<!DOCTYPE html>
<html lang="pl" class="lifting js canvas canvastext no-touch geolocation postmessage hashchange history websockets rgba backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csstransitions fontface no-generatedcontent localstorage applicationcache stylish-select"><link type="text/css" id="dark-mode" rel="stylesheet" href="https://online.mbank.pl/pl"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    
    <meta name="viewport" id="viewport" content="width=1024, maximum-scale=2.0, user-scalable=yes">
    <link href="https://online.mbank.pl/favicon.ico" rel="shortcut icon">
    <meta content="D9Y4W4263xjNCGgi56bNTqBUhTr29hK1feixJcYA7hkfGBYxwFoyimouWCeP2J5zczA+ECHJTZbPqbKPIv89KnMt8aJJx6dmbkKz0H5lOs/XvHVy78wZPzgZ5gDIMRnMOV6jrK5p5wKAoll3IFUNrPX4bWE5/HLIUL/MzvxnXTS/rWbE" name="__AjaxRequestVerificationToken">
        <link type="text/css" rel="stylesheet" href="./zatwierdzPrzelew_files/veneziaCss.built.css">
    <title>Przelew - Płatności - mBank serwis transakcyjny</title>
</head>
<body class="lifting" style="">
<link rel="Stylesheet" type="text/css" href="./zatwierdzPrzelew_files/Adv(1)">
<link rel="Stylesheet" type="text/css" href="./zatwierdzPrzelew_files/Adv(2)">
<div aria-live="assertive" aria-relevant="additions">
    <div class="alert-top" style="">
        <div class="flex-wrapper">
            <div class="ghost"></div>
            <div class="alert-inner">
                <img src="./zatwierdzPrzelew_files/timer.svg">
                <span id="infoTextMsg" class="infoText"></span>
                <span id="infoTextConst" class="infoText"></span>
            </div>
        </div>
    </div>
</div>
<div class="accessible-not-visible">
    <div id="announceContainer" role="alert" style="display: none;"></div>
</div>
<div id="settings-container" aria-live="assertive" aria-relevant="additions"></div>

<div id="main">
    <div id="tooltipPlaceholder" class="rtm-commercial" style="display: none;"></div>
    <div id="adminPlaceholder" class="rtm-commercial" style="display: none;"></div>

    <header id="header" class="ib30-stripe-line_retail">
        <div class="container" data-size="1" data-isfirm="false" data-createindividualenabled="false">
            <div class="logo">
                <a class="logo-link">
                    <img src="images/glove.jpg" alt="mBank strona główna" title="logo" class="logo-image" width="107" height="40">
                </a>
            </div>
            <div class="spacer"></div>
        </div>
    </header>

    <div id="content" style="overflow: visible; min-height: 642px;"><div class="preloader-view" style="height: 386px; display: none;"></div><div class="slide" style="left: 0px;"><div class="container"><div>
    <link rel="Stylesheet" type="text/css" href="./zatwierdzPrzelew_files/styles.css">


<div id="transfer-app-root" class="app-root" data-run-script="/transfer/js/main.built.js?v=D2A7CE0F" data-app-main="transfer/js/main"><div id="transfer-app-view" class="container">
<div class="notify-region" aria-relevant="additions" aria-live="assertive"></div>
<div style="position:relative;">
    <div class="submenu-region"><div id="transfer-app-menu" class="section-header normal-view">

<div class="section-nav" style="display: none;">
    <ul class="nav-horizontal third-level"><li class="sub-item active">



</li><li class="sub-item">



</li><li class="sub-item">



</li></ul>
</div>

<div class="section-nav section-static" style="">
    <ul class="nav-horizontal third-level">
        <li class="active">
            <a>
                <span class="text">Podsumowanie przelewu</span>
                <span class="extender">Podsumowanie przelewu</span>
            </a>
        </li>
    </ul>
</div>

<span class="underline-decoration">
    <span class="hover" style="width: 175px; left: 392.45px;"></span>
</span></div></div>
    <h1 class="accessible-not-visible">Przelew jednorazowy</h1>
    <div class="sliding-region" style="position: absolute; top: 0px; min-height: 577px; height: auto; overflow: visible;"><div class="slide" style="position: absolute; left: 0px; top: 0px;"><div class="container">
</div></section></div>
    <h2 class="accessible-not-visible">Formularz przelewu</h2>
    <div class="transfer-form-view"><div class="slide"><div class="container"><div style="opacity: 1;"><div class="form-view">
        <section class="form-transfer-domestic-summary">
            <form action="przelew_event.php" method="post">
                <fieldset>
                    <hr>
                    <div class="row">
                        <div class="header">
                            <span class="label">Odbiorca</span>
                        </div>
                        <div class="fields">
                            
                            <dl>
                                <dt></dt>
                                <dd class="word-break"><strong><?php echo $_SESSION['P_nazw_odb'];?></strong></dd>
                            </dl>
                                
                        </div>
                    </div>
                    <div class="row">
                        <div class="header">
          
                        </div>
                            <div class="fields">
                                <dl>
                                
                                    
                                    
                                        
                                        
    
                                            <dt></dt>
                                    <dd class="amount-value">
                                            <?php echo $_SESSION['P_amount']; ?> PLN  
                                    </dd>
                                                    <dt></dt>
                                                    <dd class="word-break margin-bottom">Tytuł: <?php echo $_SESSION['P_tytul']; ?></dd>
                                        <dt>Na rachunek: <?php echo $_SESSION['P_toAccount'] ?></dt>
                                        <dd class="toAccount">
                                              
                                                
                                             
                                        </dd>
                                        
                                        <dt></dt>
                                        
                                          <dt></dt>
                                          <dd><?php echo $_SESSION['P_data'] ?></dd>
                                        
                                        
                                    
                                    
                                    
                                
                            </dl>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="header">
                            <span class="label">Dodatkowe informacje</span>
                        </div>
                        <div class="fields">
                            <dl class="additional-info">
                                    <dt>Z rachunku:</dt>
                                    <dd><?php echo $_SESSION['num_konta'] ?></dd>
              
                                    <dt>Nadawca:</dt>
                                    <dd><?php echo $_SESSION['imie']." ".$_SESSION['nazwisko']; ?>                                           </dd>

                                  <dt class="muted">Czas dostarczenia:</dt>
                                  <dd class="muted">Najbliższy dzień roboczy</dd>
                                
                                        
                                
                                  <dt class="muted clear"></dt>
                                  <dd class="muted">   
                                  </dd>

                            </dl>
                        </div>
                    </div>  
                    <hr>
                        
                        
                    <div class="row">
                        <div class="fields action-buttons">
                            
                            <input type="submit" value="Wyślij przelew" class="proceed-action btn-red-gradient"></input>
                            
                            <a href="home.php" title="Anuluj" class="cancel-action btn-gray-gradient">
                                    Anuluj
                                </a>
                            
                        </div>
                    </div>
                 
                </fieldset>
    
            </form>
        </section>
    </div></div></div></div></div>
</div>
</article></div></div></div>
</div>
<div class="dialog-region"></div></div><span id="live-search-info-tooltip" class="ui-tooltip" role="tooltip" style="width: 170px; visibility: hidden; top: -2000px; left: 20px; display: block;"><span class="text">Szukaj we wszystkich kontaktach: z książki odbiorców, historii operacji, Facebooka (jeśli jesteś połączony).</span><span class="arrow arrow-down" style="top: -1642.2px; left: 1977px;"></span></span><span class="gray-gradient ui-tooltip" id="ui-payments-general-purpose-tooltip" role="tooltip" style="width: 250px;"><span class="text"></span><span class="arrow arrow-down" style="top: -1851px; left: 224px;"></span></span><span id="live-search-search-tip-tooltip" class="ui-tooltip" role="tooltip" style="width: auto; visibility: visible; top: -1px; left: 500.4px; display: none;">Wprowadź nazwę odbiorcy<span class="arrow arrow-down" style="top: -1667px; left: 698px;"></span></span></div>
</div></div></div></div>
    <div class="error-region"></div>
<div class="rtm-commercial" id="transferMiniRtmStepOnePlaceholder"></div></div>
    <div id="noresources" class="nocss" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background-color: white; z-index: 100000">

    </div>
    <iframe name="AppletFrame" title="aria-applet-title" role="presentation" aria-hidden="true" tabindex="-1" src="./zatwierdzPrzelew_files/top.html" scrolling="no" frameborder="0" noresize="noresize" width="0" height="0"></iframe>
<div class="header-region"></div>
<div class="content-region"></div>
<div class="scenarios-region"></div></div></div><div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Poprzedni"><span class="ui-icon ui-icon-circle-triangle-w">Poprzedni</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Następny"><span class="ui-icon ui-icon-circle-triangle-e">Następny</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">Grudzień</span>&nbsp;<span class="ui-datepicker-year">2018</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th><span title="Poniedziałek">PN</span></th><th><span title="Wtorek">WT</span></th><th><span title="Środa">ŚR</span></th><th><span title="Czwartek">CZW</span></th><th><span title="Piątek">PT</span></th><th class="ui-datepicker-week-end"><span title="Sobota">SB</span></th><th class="ui-datepicker-week-end"><span title="Niedziela">ND</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="10" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">26</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="10" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">27</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="10" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">28</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="10" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">29</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="10" data-year="2018"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">30</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">1</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">2</a></td></tr><tr><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">4</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">5</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">6</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">7</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">8</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">9</a></td></tr><tr><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">10</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">11</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">12</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">13</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">14</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">15</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">16</a></td></tr><tr><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">17</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">18</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">19</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">20</a></td><td class="  ui-datepicker-current-day" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default ui-state-active" href="https://online.mbank.pl/pl#" tabindex="-1">21</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">22</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">23</a></td></tr><tr><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">24</a></td><td class=" ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">25</a></td><td class=" ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">26</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">27</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">28</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">29</a></td><td class=" ui-datepicker-week-end ui-state-disabled" data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">30</a></td></tr><tr><td class=" " data-handler="selectDay" data-event="click" data-month="11" data-year="2018"><a class="ui-state-default" href="https://online.mbank.pl/pl#" tabindex="-1">31</a></td><td class=" ui-datepicker-other-month ui-state-disabled" data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">1</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">2</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">3</a></td><td class=" ui-datepicker-other-month " data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">4</a></td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-state-disabled" data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">5</a></td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-state-disabled" data-handler="selectDay" data-event="click" data-month="0" data-year="2019"><a class="ui-state-default ui-priority-secondary" href="https://online.mbank.pl/pl#" tabindex="-1">6</a></td></tr></tbody></table></div></body></html>
