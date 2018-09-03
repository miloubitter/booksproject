<div class="slides">
    <div class="slide ">
        <div>
            <img src="img/Banner2.jpg" alt="" />
        </div>
    </div><!--/Slide 1-->

    <div class="slide">
        <div>
            <img src="img/Banner3.jpg" alt="" />
        </div>
    </div><!--/Slide 3-->
    <div class="slide">
        <div>
            <img src="img/Banner5.jpg" alt="" />
        </div>
    </div><!--/Slide 4-->
    <div class="slide">
        <div>
            <img src="img/Banner6.jpg" alt="" />
        </div>
    </div><!--/Slide 5-->

</div>

<div class="container">
    <div class="intro">
        <h1>Wecome on the webpage for the online bookstore </h1> <br />
            <p>There is so much to see on this website. We have a large various collection of books. <br /> Have fun reading. </p> <br /><br /><br />
    </div>

        <h2>Top 5 books</h2>
    <ol>
    <?php

    foreach ($viewModel['books'] as $id=>$book) { ?>

            <li> <p><?php echo $book['title']?> </p>
                <p> Afbeelding </p></li>
        <?php
    }
    ?>
    </ol>

</div>


<script src="js/slick.js"></script>