<section id="features">

    
    <h2> Our top features </h2>
    <?php
        loadUI('feature1');
        loadUI('feature2');
        loadUI('feature3');
        loadUI('feature4');
    ?>

    <section class="slider">
        
        <div class="slider_button">

            <div class="slider_nav">
                <span class="current_slide" data-slide="feature1" onclick="slide('feature1')">1</span>
                <span data-slide="feature2" onclick="slide('feature2')">2</span>
                <span data-slide="feature3" onclick="slide('feature3')">3</span>
                <span data-slide="feature4" onclick="slide('feature4')">4</span>
            </div>

            <p onclick="slide()"> Click for more highlights </p>
            <div class="slider_arrow">
                <span class="next_line arrow_right"> </span>
                <button onclick="slide()"  title="Click for previous slide"> <i class="pe-7s-angle-right"></i> </button>
            </div>

        </div>

    </section>

</section>

