<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>___title___</title>
</head>
<body>

<pre>

<nav>
<?php
    $this->setSection('navigation', $this->render('_navigation'));
    echo $this->getSection('navigation');
?>
</nav>

<?php echo $this->getContent(); ?>

<?php
    $this->setSection('footer', $this->render('_footer'));
    echo $this->getSection('footer');
?>

</pre>

</body>
</html>
