<div id="cta">
    
    <section id="close_cta">
        <span onclick="cta('no')"> <i class="pe-7s-close"></i> </span>
    </section>

    <div id="enroll_question"> 
        
        <p> Do you have more questions to ask about our school? </p>

        <div class="cta_buttons">
            <button onclick="cta_form('success')"> Yes </button>
            <button onclick="cta('no')"> No </button>
        </div>
    </div>

    <div id="cta_referral">

        <p> We noticed that one of your contacts <?php echo REF_NAME; ?> invited you. After you must have gone through our website, would you like to book a visit to our school? </p>
        <div class="cta_buttons">
            <button onclick="cta_form('continue')"> Yes </button>
            <button onclick="cta('no')"> No </button>
        </div>
    </div>

    <div id="cta_facebook">
        <p> We noticed that you clicked on our link from <u>Facebook</u> . After you must have gone through our website, would you contact you to discuss more? </p>
        <div class="cta_buttons">
            <button onclick="cta_form('continue')"> Yes </button>
            <button onclick="cta('no')"> No </button>
        </div>
    </div>

    <div id="cta_schedule">
        <p> Would you be available next week to visit our school? </p>
        <div class="cta_buttons">
            <button onclick="select_schedule('next_week')"> Yes </button>
            <button onclick="cta('enroll_question')"> No </button>
            <button onclick="cta('cta_schedule2')"> Not next week </button>
        </div>
    </div>

    <div id="cta_schedule2">
        <p> When will you like to visit our school? </p>
        <div class="cta_buttons">
            <button onclick="select_schedule('this_week')"> This week </button>
            <button onclick="select_schedule('two_weeks')"> Next 2 weeks </button>
            <button onclick="select_schedule('next_month')"> Next month </button>
            <button onclick="select_schedule('soon')"> Soon </button>
        </div>
    </div>

    <div id="cta_lead">
    </div>

    <div id="submit_number"> 

        <p> Please submit your phone number below and we'll call you to answer all your questions </p>

        <form>

            <input type="text" name="full_name" placeholder="Your name" required>
            <input type="text" name="phone_number" placeholder="Your phone number" required>

            <div align="right">
                <button type="submit"> Submit  <i class="pe-7s-angle-right"></i> </button>
            </div>
            <input type="hidden" name="schedule" value="none">
            <input type="hidden" name="where_next">
        </form>

    </div>

    <div id="cta_success">
        <i class="pe-7s-check"></i>
        <p>We have gotten your phone number and would call you as soon as possible. If you still have time, you can use the 'Facebook' link at the bottom to explore our page.</p>
    </div>

    <section id="cta_image">
        <img src="_assets/images/profile-picture.jpg" alt="bluediamond_admin">
    </section>

    <input type="hidden" name="active_cta" value="<?php echo ACTIVE_CTA;?>">
</div>