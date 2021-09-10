<?php $this->layout('template', ['title' => 'HomePage']);

use App\queryBuilder;

$db = new queryBuilder();

$posts = $db->getAll('posts');

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>This is Home page!</h1>
            <p>Hello, <?=$this->e($name)?></p>
            <hr>
        </div>
        <!-- /.col-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php

            foreach ($posts as $post ){ ?>
                <h2><?php echo $post['title']?></h2>
                <p><?php echo $post['body']?></p>
            <?php } ?>
        </div>
        <!-- /.col-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
