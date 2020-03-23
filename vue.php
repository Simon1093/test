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
<div class="container">
    <div class="row mt-3">
        <div id="app">
            <div v-for="good in goods" class="alert alert-primary">{{ good.Name }}</div>
            <button v-on:click="getGoods" class="btn btn-outline-primary">Get goods</button>
        </div>
    </div>
</div>
</body>
</html>
