<?php
$idUser = checkAuth();
foreach ($articles as $article) {
?>

<blockquote>
    <h4><?= $article["title"] ?></h4>

    <?php
    if ($article["image"]) {
        echo '<img src="'.$article["image"].'" alt="img'.$article["id"].'">';
    }
    ?>
    <p>
        <?= $article["text"] ?>
    </p>
    <footer><?= $article["createDate"] ?>
        <cite title="Source Title">
            <?= $article["name"]." ".$article["l_name"] ?>
        </cite>
        
        <?php
        if ($article['idUser'] === $idUser) {
            echo '<br><a href="news.php?articleId='.$article["id"].'">Delete Article</a>';
            echo '<br><a href="addNews.php?articleId='.$article["id"].'">Modify the Text</a>';
        }
        ?>

    </footer>
</blockquote>

<?php
}
?>



<!--<blockquote>
    <h4>Name</h4>
    <img src="images/articles/1.jpg" alt="img">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quis eius facere eos alias, mollitia earum temporibus saepe, ex commodi dignissimos assumenda velit voluptatibus fugit minima. Perspiciatis repellendus fugiat architecto quas in earum blanditiis accusantium dignissimos sunt iure dolorum autem, nisi perferendis dolor voluptate qui ut dolore porro nobis officia odit vel, tempora pariatur praesentium ab. Non impedit animi consequuntur odio quas aliquid placeat ratione voluptatem ab eos, consequatur ducimus beatae, provident ipsum debitis commodi. Ratione voluptate porro doloribus molestiae labore minus aliquid quae? Architecto blanditiis nesciunt et deserunt maxime velit quis sequi voluptatum ratione magnam temporibus veniam dolore totam vitae similique iste praesentium ea aspernatur porro qui, natus quam repellendus eveniet perferendis enim? Voluptatum, facilis porro neque, quibusdam animi laborum quo, quod sapiente nobis aperiam iure nisi officia quam illum ea ullam? Architecto, ad repellendus, dolore soluta rerum ipsam excepturi sapiente cum, deserunt sit culpa quod magni veritatis. Dolorem odio tempore iure at nisi veniam porro rem earum, ullam, qui neque quibusdam. Tempora nemo, reprehenderit nulla ratione, laudantium quas ducimus, repudiandae veniam molestias enim quaerat, rem illum delectus earum blanditiis! Vitae rem ea voluptate iusto quasi perspiciatis officiis minima unde delectus eos recusandae dolorum nemo ut magnam repudiandae placeat praesentium, et accusantium fugit sed odit, porro natus molestiae. Vero, officiis! Quaerat et quisquam voluptatibus autem dolores commodi excepturi dolorem, iure dolor amet aspernatur, dolorum voluptas perspiciatis itaque facilis ullam nobis perferendis culpa nemo ex, magnam. Esse assumenda beatae, magni, alias porro velit rem odit 
    </p>
    <footer>2014-12-05 Someone famous in <cite title="Source Title">Source Title</cite>
        <br><a href="news.php">Delete Article</a>
    </footer>
</blockquote>

<blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
</blockquote>
<blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
</blockquote>
<blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
</blockquote>
<blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
</blockquote>
 -->