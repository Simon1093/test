<?php session_start() ?>
<html>
<head>
    <script src="../js/libs/bootstrap4.js"></script>
    <link rel="stylesheet" href="../css/bootstrap4.css">

    <script src="node_modules/vue/dist/vue.common.dev.js"></script>
    <script src="node_modules/axios/dist/axios.js"></script>
    <script src="js/vue.js" type="module"></script>
</head>
<body>
<div class="container" id="app">
    <div class="row mt-3">
        <div class="offset-3 col-md-6">
            <label>Enter user link:</label>
            <input type="text" class="form-control" v-model="userLink" placeholder="https://vk.com/****">
            <button v-on:click="getUser" class="btn btn-primary mt-3">Add user</button>
        </div>
    </div>
    <div class="row mt-3" v-if="userInfo.first_name !== null">
        <div class="offset-3 col-md-6">
            <div class="jumbotron">
                <h3>{{ userInfo.first_name + " " + userInfo.last_name }}</h3>
                <hr>
                <h4>{{ userInfo.city }}</h4>
                <img class="img-thumbnail" v-bind:src="userInfo.photo"/>
            </div>
        </div>
    </div>
</div>
</body>
</html>
