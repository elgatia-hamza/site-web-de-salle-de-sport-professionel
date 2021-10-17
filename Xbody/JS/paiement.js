function check_card_number() {
  var card_number = document.getElementById("card_number").value;
  var txt_card_number = document.getElementById("txt_card_number");

  if (isNaN(card_number)) {
    txt_card_number.innerHTML = "الارقام فقط";
    txt_card_number.style.color = "#ff0000";
    return false;
  } else if (card_number.length != 16) {
    txt_card_number.innerHTML = "رقم بطاقة غير صحيح";
    txt_card_number.style.color = "#ff0000";
    return false;
  } else {
    txt_card_number.innerHTML = "الرقم صحيح";
    txt_card_number.style.color = "#00ff00";
    return true;
  }

  if (card_number == "") {
    txt_card_number.innerHTML = "";
    return false;
  }
}

function check_name_on_card() {
  var name_on_card = document.getElementById("name_on_card").value;
  var txt_name_on_card = document.getElementById("txt_name_on_card");

  if (!/([a-zA-Z]+)|([ا-ي]+)$/.test(name_on_card)) {
    txt_name_on_card.innerHTML = "الاسم غير صحيح";
    txt_name_on_card.style.color = "#ff0000";
    return false;
  } else {
    txt_name_on_card.innerHTML = "";
  }

  if (name_on_card == "") {
    return false;
  }

  return true;
}

function check_expiry_date() {
  var expiry_date = document.getElementById("expiry_date");
  var txt_expiry_date = document.getElementById("txt_expiry_date");

  if (expiry_date.value.length == 2) {
    expiry_date.value += " / ";
  }

  if (expiry_date.value.length == 7) {
    var date = expiry_date.value.split("/");

    txt_expiry_date.innerHTML = test_date(date);
    txt_expiry_date.style.color = "#ff0000";
  } else {
    txt_expiry_date.innerHTML = "";
  }
}

function test_date(date) {
  if (isNaN(date[0]) || isNaN(date[1])) {
    return "الارقام فقط";
  }

  if (Number(date[0]) > 12 || Number(date[0]) < 0) {
    return "الشهر غير صحيح";
  }

  if (Number(date[1]) < 20) {
    return "البطاقة منتهية الصلاحية";
  }

  return "";
}

function check_csc() {
  var csc = document.getElementById("csc").value;
  var txt_csc = document.getElementById("txt_csc");

  console.log(80);
  if (isNaN(csc)) {
    txt_csc.innerHTML = "الارقام فقط";
    txt_csc.style.color = "#ff0000";
  }

  if (csc == "") {
    txt_csc.innerHTML = "";
  }
}

function check_code_postal() {
  var code_postal = document.getElementById("code_postal").value;
  var txt_code_postal = document.getElementById("txt_code_postal");

  var message = test_code_postal(code_postal);

  txt_code_postal.innerHTML = message;
  txt_code_postal.style.color = "#ff0000";
}

function test_code_postal(code_postal) {
  if (isNaN(code_postal)) {
    return "الارقام فقط";
  }

  if (code_postal == "" || code_postal.length == 5) {
    return "";
  }

  if (code_postal.length != 5) {
    return "الرمز غير صحيح";
  }
}
