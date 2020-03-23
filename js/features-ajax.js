function getGoods() {
    $.ajax({
        method: "POST",
        url: "/ajax/getGoods.php"
    }).done(function (data) {
        let goods = JSON.parse(data);
        console.log(goods);
        $('#goods-list').html('');
        goods.forEach(function (item) {
            $('#goods-list').append('<div class="alert alert-primary">' + item.Name + '</div>');
        })
    });
}

setInterval(function () {
    getGoods();
}, 2000);