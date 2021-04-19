<section id="link_button" class="bottom_back_link" onclick="share_link()">
    <i class="pe-7s-angle-left"></i> 
    <button> Want to share link instead? </button>
</section>

<section id="share_link">

    <p> Below is your referral link. Copy the link below and share it with your contacts using social media platforms, text message and any other means. </p>
    <div id="link_form">
        <input type="text" name="referral_link" value="https://bluediamond.com.ng">
        <button onclick="copy_link()"> Copy link </button>
    </div>
        
    <div id="copied_message">
        <p class="successful">
            Your link was successfully copied. You can now paste it on any platform or as sms to anyone. </p>
        <p class="error">
            Could not copy link. Highlight the link above and try copying manually, or use one of the share buttons below.
        </p>
    </div>

    <a href="https://wa.me" name="whatsapp"> <button> <img src="_assets/icons/whatsapp.svg" width="14"> Share on WhatsApp </button> </a>
    <a href="https://fb.com" name="facebook"> <button > <img src="_assets/icons/facebook.svg"  width="14"> Share on Facebook </button> </a>

</section>


<!-- <section id="back_refer" class="bottom_back_link" onclick="back_refer()">
    <i class="pe-7s-angle-left"></i> 
    <button> Want to refer someone in particular? </button>
</section> -->