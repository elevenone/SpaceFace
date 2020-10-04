<html>
<head>
    <link rel="stylesheet" href="/ui/css/main.css" />
</head>
<body>



<pre>



<nav>
<?php
    $this->setSection('navigation', $this->render('_navigation'));
    echo $this->getSection('navigation');
?>
</nav>




<div id="pfetch-body">

<!-- CONTAINER -->
<section id="container">

<main id="maincontent" role="main">

<?php echo $this->getContent(); ?>

</main>

</section>
<!-- / CONTAINER -->

</div





<footer>
<?php
    $this->setSection('footer', $this->render('_footer'));
    echo $this->getSection('footer');
?>
</footer>



</pre>


<script type="module" src="/ui/js/pfetch/dist/pfetch.min.js"></script>
<script src="/ui/js/main.js"></script>



</body>
</html>
