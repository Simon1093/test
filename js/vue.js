const app = new Vue({
    el: '#app',
    data: {
        goods: [],
        message: 'Привет, Vue!',
        name: 'John'
    },
    methods: {
        getGoods: function () {
            var vm = this;
            axios.post("/ajax/getGoods.php").then(function (payload) {
                vm.goods = payload.data;
            })
        }
    }
});
