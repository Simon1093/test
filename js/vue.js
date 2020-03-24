const app = new Vue({
    el: '#app',
    data: {
        userLink: null,
        userInfo: {
            first_name: null,
            last_name: null,
            city: null,
            photo: null
        }
    },
    methods: {
        getUser: function () {
            var vm = this;
            axios.post("/ajax/getVkUser.php", {link: this.userLink}).then(function (payload) {
                vm.userInfo = payload.data;
            })
        }
    }
});
