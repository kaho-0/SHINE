function confirm_test() { // 問い合わせるボタンをクリックした場合
    document.getElementById('popup').style.display = 'block';
    return false;
}

function okfunc() { // OKをクリックした場合
    document.contactform.submit();
    dbDisConnect();
}

function nofunc() { // キャンセルをクリックした場合
    document.getElementById('popup').style.display = 'none';
}
