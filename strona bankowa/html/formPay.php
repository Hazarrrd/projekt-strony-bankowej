<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header('Location: index.php');
        exit();
    }
    if(isset($_SESSION[''])) {

    }
?>

<!DOCTYPE html>
<html lang="pl" class="lifting js canvas canvastext no-touch geolocation postmessage hashchange history websockets rgba backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csstransitions fontface no-generatedcontent localstorage applicationcache stylish-select"><link type="text/css" id="dark-mode" rel="stylesheet" href="https://online.mbank.pl/pl"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    
    <meta name="viewport" id="viewport" content="width=1024, maximum-scale=2.0, user-scalable=yes">
    <link href="https://online.mbank.pl/favicon.ico" rel="shortcut icon">
    <meta content="D9Y4W4263xjNCGgi56bNTqBUhTr29hK1feixJcYA7hkfGBYxwFoyimouWCeP2J5zczA+ECHJTZbPqbKPIv89KnMt8aJJx6dmbkKz0H5lOs/XvHVy78wZPzgZ5gDIMRnMOV6jrK5p5wKAoll3IFUNrPX4bWE5/HLIUL/MzvxnXTS/rWbE" name="__AjaxRequestVerificationToken">
        <link type="text/css" rel="stylesheet" href="./przelew_files/veneziaCss.built.css">
    <title>Przelew - Płatności - mBank serwis transakcyjny</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="scripts/validPrzelew.js"></script>
</head>
<body class="lifting" style="">
<link rel="Stylesheet" type="text/css" href="./przelew_files/Adv(1)">
<link rel="Stylesheet" type="text/css" href="./przelew_files/Adv(2)">
<div aria-live="assertive" aria-relevant="additions">
    <div class="alert-top" style="">
        <div class="flex-wrapper">
            <div class="ghost"></div>
            <div class="alert-inner">
                <img src="./przelew_files/timer.svg">
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
               <a href="/home.php" class="logo-link">
                    <img src="./images/glove.jpg" title="logo" class="logo-image" width="107" height="40" alt="Powrót do konta">
                </a>
            </div>
            <div class="spacer"></div>
            <div id="user-profile">
                
                <div class="user-name NmB-owner"><?php echo $_SESSION['imie']." ".$_SESSION['nazwisko']; ?></div>
                
                <nav id="accounts-selector" aria-label="Wybór profilu"><div><div id="accounts-selector-root">
    <ul>
        <li>
            <div class="selected-context">Profil indywidualny</div>
        </li>
    </ul>
</div></div></nav>

            </div>
        </div>
    </header>

    <div id="content" style="overflow: visible; min-height: 642px;"><div class="preloader-view" style="height: 386px; display: none;"></div><div class="slide" style="left: 0px;"><div class="container"><div>
    <link rel="Stylesheet" type="text/css" href="./przelew_files/styles.css">


<div id="transfer-app-root" class="app-root" data-run-script="/transfer/js/main.built.js?v=D2A7CE0F" data-app-main="transfer/js/main"><div id="transfer-app-view" class="container">
<div class="notify-region" aria-relevant="additions" aria-live="assertive"></div>
<div style="position:relative;">
<form action="zatwierdzPrzelew.php" method="post">
<span class="underline-decoration">
    <span class="hover" style="width: 222px; left: 146.513px;"></span>
</span></div></div>
    <h1 class="accessible-not-visible">Przelew jednorazowy</h1>
    <div class="sliding-region" style="position: absolute; top: 0px; min-height: 577px; height: auto; overflow: visible;"><div class="slide" style="position: absolute; left: 0px; top: 0px;"><div class="container"><article id="transfer-container" style="opacity: 1;">
<div class="transfer-receiver-view"><section class="transfer-receiver"><div class="recipients-livesearch">
  <span class="validation-icon"></span>
    <label for="recipients-livesearch-query">Nazwa odbiorcy</label>
    <div class="livesearch-border">
        <h2 class="accessible-not-visible">Nazwa odbiorcy</h2> 
        <div id="live-search-field-wrapper" class="search-field-wrapper input-decorated"><div id="livesearch-placeholder-for-ie10" style="position: absolute; top: -4px; left: 10px; font-weight: bold; z-index: 100; color: rgb(186, 186, 186); display: none;"></div>
            <input name="nazw_odb" type="text" id="recipients-livesearch-query" pattern="[a-zA-Z]*[\s]?[a-zA-Z]*" placeholder="" maxlength="70" class="recipient-set ui-livesearch-searcher" role="combobox" aria-describedby="live-search-field-tooltip" aria-owns="live-search-results-region" autocomplete="off" required>
        </div>
        <ul id="live-search-results-region" class="search-results-region ui-livesearch-list" style="background-color: White;" role="listbox"></ul>
    </div>
</div>
</section></div>
<div style="position:relative" class="">
    



    <div class="transfer-form-view"><div class="slide"><div class="container"><section class="form-view" style="opacity: 1;"><div class="form-transfer-domestic">
    <div id="form-container">
        <fieldset>        <hr>        <div class="row row-fromAccount">        <div class="header">          <label for="c198_fromAccount">Z rachunku</label>                  </div>        <div class="fields">          <span class="validation-icon"></span>          <select id="c198_fromAccount" name="fromAccount" class="beautify-select select-long chzn-done" placeholder="Numer rachunku źródłowego" aria-label="Z rachunku" style="display: none;"><option value="r3Acs1XQkTHVKOk3KFaetFbZUDpkYbNbISXUFOrrQmqoReSsrT/ogOTRp5sVo/hIbi8BIsRl7XakOjfPDQh3qQ=="></option></select><div id="c198_fromAccount_chzn" class="chzn-container chzn-container-single c198_fromAccount newListSelected chzn-container-single-nosearch" style="" title=""><a href="javascript:void(0)" class="chzn-single selectedTxt"><span><strong><?php echo $_SESSION['num_konta'] ?></strong><br></span></a><div style="left: -9000px; top: 0px;" class="chzn-drop"><div id="c1542836000978_results" class="chzn-search"><label for="c1542836000978" style="display: none;"></label><input type="text" autocomplete="off" tabindex="-1" role="combobox" aria-autocomplete="list" aria-expanded="true" aria-owns="c1542836000978_results" aria-label="Z rachunku" id="c1542836000978" aria-activedescendant="c198_fromAccount_chzn_o_0" readonly="readonly" style="width: 100%;"></div><div class="scroll-pane" style="overflow: hidden; padding: 0px; height: 0px; width: 514px;"><div class="jspContainer" style="width: 514px; height: 0px;"><div class="jspPane" style="top: 0px; width: 514px;"><ul class="chzn-results" aria-label="Z rachunku" role="listbox"><li id="c198_fromAccount_chzn_o_0" class="active-result result-selected" role="option" aria-label="eKonto - 8611 ... 1311 (2 938,79 PLN)&lt;br/&gt;">eKonto - 8611 ... 1311 &lt;strong&gt;(2 938,79 PLN)&lt;/strong&gt;&lt;br/&gt;</li></ul></div></div></div></div></div>                    <div role="alert" class="validation-text"></div>        </div>      </div><div class="row row-sender hide" style="display: none;">        <div class="header">          <label for="form-select-sender">Nadawca</label>                  </div>        <div class="fields">          <span class="validation-icon"></span>          <select id="form-select-sender" name="sender" class="beautify-select select-medium chzn-done" aria-label="Nadawca" style="display: none;"><option value="iWc8hTrAvCyLMja2ghIxQG4AhsHO96Zn7sNTaWm8Sbc=" data-bold-text="">Mateusz Laskowski</option></select><div id="form_select_sender_chzn" class="chzn-container chzn-container-single form-select-sender newListSelected chzn-container-single-nosearch" style="" title=""><a href="javascript:void(0)" class="chzn-single selectedTxt"><span>Jan Sieradzki</span></a><div style="left: -9000px; top: 0px;" class="chzn-drop"><div id="c1542836000982_results" class="chzn-search"><label for="c1542836000982" style="display: none;"></label><input type="text" autocomplete="off" tabindex="-1" role="combobox" aria-autocomplete="list" aria-expanded="true" aria-owns="c1542836000982_results" aria-label="Nadawca" id="c1542836000982" readonly="readonly" aria-activedescendant="form_select_sender_chzn_o_0" style="width: 100%;"></div><div class="scroll-pane" style="overflow: hidden; padding: 0px; height: 0px; width: 0px;"><div class="jspContainer" style="width: 0px; height: 0px;"><div class="jspPane" style="top: 0px; width: 0px;"><ul class="chzn-results" aria-label="Nadawca" role="listbox"><li id="form_select_sender_chzn_o_0" class="active-result result-selected" role="option" aria-label="Jan sieradzki">Jan Sieradzki</li></ul></div></div></div></div></div>                    <div role="alert" class="validation-text"></div>        </div>      </div><div class="row row-toAccount validation">        <div class="header">          <label for="toAccount">Na rachunek</label>                                   </div>        <div class="fields">          <span class="validation-icon"></span>          <input id="toAccount" name="toAccount" class="extralong" maxlength="38" minlength="16" placeholder="Podaj numer rachunku" type="text" pattern="[0-9]*" required autocomplete="off">                   </div>      </div><div class="row-wrapper two-lines">        <div class="row">          <div class="fields">          </div>        </div>        <div class="row row-address expand-group">          <div class="header">            <label id="addressLabel" for="c198_address"></label>          </div>          <div class="fields">            <span class="validation-icon"></span>            <div id="c198_address" class="bbf-object" name="address"><div><div><div class="fields-row row-street">        <span class="validation-icon"></span>        <label for="c198_address_street" class="accessible-not-visible">Ulica i numer</label>        <input id="c198_address_street" name="street" class="long optional" placeholder="Ulica i numer" maxlength="35" type="text">        <div role="alert" class="validation-text"></div>      </div><div class="fields-row row-city">        <span class="validation-icon"></span>        <label for="c198_address_city" class="accessible-not-visible">Kod pocztowy i miejscowość</label>        <input id="c198_address_city" name="city" class="long optional" placeholder="Kod pocztowy i miejscowość" maxlength="35" type="text">        <div role="alert" class="validation-text"></div>      </div></div></div></div>            <div class="validation-text"></div>          </div>        </div>      </div><div class="row row-amount" style="">        <div class="header">          <label for="amount">Kwota</label>        </div>        <div class="fields">          <span class="validation-icon"></span>          <input id="amount" name="amount" type="text" required value="00.00">          <div role="alert" class="validation-text"></div>        </div>      </div><div class="row-currency" style="display: none;">        <span id="c198_currency" name="currency">PLN</span>      </div><div class="row-available-currency active" style="display: block;">        <label for="form-select-currency-amount" class="accessible-not-visible">Currencies</label>        <select id="form-select-currency-amount" name="currencies" class="beautify-select select-short chzn-done" aria-label="Currencies" style="display: none;"><option>PLN</option><option>CHF</option><option>EUR</option><option>GBP</option><option>USD</option><option>AUD</option><option>CAD</option><option>CZK</option><option>DKK</option><option>HUF</option><option>JPY</option><option>NOK</option><option>SEK</option></select><div id="form_select_currency_amount_chzn" class="chzn-container chzn-container-single form-select-currency-amount newListSelected chzn-container-single-nosearch" style="" title=""><a href="javascript:void(0)" class="chzn-single selectedTxt"><span>PLN</span></a><div style="left: -9000px; top: 0px;" class="chzn-drop"><div id="c1542836000984_results" class="chzn-search"><label for="c1542836000984" style="display: none;"></label><input type="text" autocomplete="off" tabindex="-1" role="combobox" aria-autocomplete="list" aria-expanded="true" aria-owns="c1542836000984_results" aria-label="Currencies" id="c1542836000984" readonly="readonly" aria-activedescendant="form_select_currency_amount_chzn_o_0" style="width: 100%;"></div><div class="scroll-pane jspScrollable" style="overflow: hidden; padding: 0px; height: 259px; width: 80px;"><div class="jspContainer" style="width: 80px; height: 259px;"><div class="jspPane" style="top: 0px; width: 66px;"><ul class="chzn-results" aria-label="Currencies" role="listbox"><li id="form_select_currency_amount_chzn_o_0" class="active-result result-selected" role="option" aria-label="PLN">PLN</li><li id="form_select_currency_amount_chzn_o_1" class="active-result" role="option" aria-label="CHF">CHF</li><li id="form_select_currency_amount_chzn_o_2" class="active-result" role="option" aria-label="EUR">EUR</li><li id="form_select_currency_amount_chzn_o_3" class="active-result" role="option" aria-label="GBP">GBP</li><li id="form_select_currency_amount_chzn_o_4" class="active-result" role="option" aria-label="USD">USD</li><li id="form_select_currency_amount_chzn_o_5" class="active-result" role="option" aria-label="AUD">AUD</li><li id="form_select_currency_amount_chzn_o_6" class="active-result" role="option" aria-label="CAD">CAD</li><li id="form_select_currency_amount_chzn_o_7" class="active-result" role="option" aria-label="CZK">CZK</li><li id="form_select_currency_amount_chzn_o_8" class="active-result" role="option" aria-label="DKK">DKK</li><li id="form_select_currency_amount_chzn_o_9" class="active-result" role="option" aria-label="HUF">HUF</li><li id="form_select_currency_amount_chzn_o_10" class="active-result" role="option" aria-label="JPY">JPY</li><li id="form_select_currency_amount_chzn_o_11" class="active-result" role="option" aria-label="NOK">NOK</li><li id="form_select_currency_amount_chzn_o_12" class="active-result" role="option" aria-label="SEK">SEK</li></ul></div><div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><div class="jspTrack" style="height: 248px;"><div class="jspDrag" style="height: 68px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><div class="jspCap jspCapBottom"></div></div></div></div></div></div>      </div><div class="row row-title validation success" style="">        <div class="header">          <label for="title">Tytuł przelewu</label>                  </div>        <div class="fields">          <span class="validation-icon"></span>          <textarea id="title" name="title" class="extralong single-row expanding" maxlength="140" type="text" style="overflow: hidden;" required>Przelew</textarea>                    <div role="alert" class="validation-text"></div>        <div style="position: absolute; display: none; overflow-wrap: break-word; white-space: pre-wrap; border-color: rgb(236, 236, 236) rgb(236, 236, 236) rgb(155, 155, 155); border-style: solid; border-width: 1px 1px 2px; font-weight: 400; width: 492px; font-family: OpenSansRegular; line-height: 17px; font-size: 13px; padding: 10px;">Przelew środków&nbsp;</div><div style="position: absolute; display: none; overflow-wrap: break-word; white-space: pre-wrap; border-color: rgb(236, 236, 236) rgb(236, 236, 236) rgb(155, 155, 155); border-style: solid; border-width: 1px 1px 2px; font-weight: 400; width: 492px; font-family: OpenSansRegular; line-height: 17px; font-size: 13px; padding: 10px;">Przelew środków&nbsp;</div></div>      </div><div class="row-submitButtons row action-buttons">        <div class="fields">            <div id="c198_submitButtons" class="bbf-object" name="submitButtons"><div><div>
            <div class="fl">        
                <input id="c198_submitButtons_submit" name="submit" class="save-form btn-red-gradient" type="submit" />   
            </div>
            <div class="fl">        <a id="c198_submitButtons_cancel" name="cancel" class="cancel-form btn-gray-gradient" href="http://localhost/mateuszbank/home.php">Anuluj</a>      </div></div></div></div>        </div>      </div>      </fieldset>
        </form>
        </div>
</div></section></div></div></div>
</div>
</article></div></div></div>
</div>
<div class="dialog-region"></div></div><span id="live-search-info-tooltip" class="ui-tooltip" role="tooltip" style="width: 170px;"><span class="text"></span><span class="arrow arrow-down" style="top: -1851px; left: 109px;"></span></span><span class="gray-gradient ui-tooltip" id="ui-payments-general-purpose-tooltip" role="tooltip" style="width: 250px;"><span class="text"></span><span class="arrow arrow-down" style="top: -1851px; left: 224px;"></span></span><span id="live-search-search-tip-tooltip" class="ui-tooltip" role="tooltip" style="width: auto; visibility: visible; top: -1px; left: 500.4px; display: none;">Wprowadź nazwę odbiorcy<span class="arrow arrow-down" style="top: -1667px; left: 698px;"></span></span><span class="gray-gradient ui-tooltip" id="series-trigger-tooltip" role="tooltip" style="width: 170px; top: -2000px; left: 20px; visibility: hidden; display: block;">
	<span class="text">
	
		Zaplanuj serię kilku lub więcej przelewów do wybranego odbiorcy na dowolnie wybrane kwoty, w dowolnych terminach oraz z dowolnie określoną częstotliwością.
	
	</span>
<span class="arrow arrow-down" style="top: -301px; left: 2461px;"></span></span><span class="gray-gradient ui-tooltip" id="recurrent-trigger-tooltip" role="tooltip" style="width: 170px; top: 239px; left: 785.4px;">
<span class="arrow arrow-down" style="top: -1279px; left: 1003px;"></span></span></div>
</div></div></div></div>
    
    <?php      
        if(isset($_SESSION['error_kwota'])) {
            echo '<p style="color: red;">'.$_SESSION['error_kwota'].'!</p>';
            unset($_SESSION['error_kwota']);
        }
        if(isset($_SESSION['error_server'])) {
            echo '<p style="color: red;">'.$_SESSION['error_server'].'!</p>';
            unset($_SESSION['error_server']);
        }
    ?>

</body></html>
