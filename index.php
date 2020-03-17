<?php
session_start();
?>
<html>

<?php include_once 'templates/libs.php' ?>
<style>
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
    }
</style>
<body>
<div style="z-index: 200" class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <?php include_once 'templates/header.php' ?>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">My project</h1>
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the
            text, and add your own fullscreen background photo to make it your own.</p>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
            <a href="#" class="btn btn-lg btn-secondary">About</a>
        </p>
    </main>

    <?php include_once 'templates/footer.php' ?>
</div>
<script>
    particlesJS.load('particles-js', 'assets/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>

<div id="particles-js"></div>

</body>
</html>


