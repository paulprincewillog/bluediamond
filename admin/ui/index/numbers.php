<section id="check_numbers" backTo="#admin_dashboard">

    <form id="search_for_numbers" class="searchbox" dd_submit="yes" dd_bindResult="#all_numbers" method="POST" action="app/index/check_numbers">
        <input type="text" name="search" placeholder="Type a name or number to search">
        <button type="submit"> <i class="pe-7s-search"></i> </button>
    </form>

    <section id="all_numbers" dd_amount="all">

        <div class="each_number" dd_clone="2">

            <section>

                <div>
                    <p dd_display="full_name" class="dd_longline"></p>
                    <p dd_display="phone_number" class="dd_shortline"></p>
                </div>

                <a href="tel: [phone_number]" dd_attr="phone_number"> <button> <i class="pe-7s-call"></i> </button> </a>

            </section>

            <section class="source">

                <button dd_display="source" dd_attr="source" class="source_[source]"> Referred </button>

                <span dd_display="source_details" dd_checkFor="source" dd_if="not_empty">  
                    By Mrs Merciful - 07061988188 
                </span>
                <a  dd_checkFor="source" dd_if="Referred" href="tel: [phone_number]" dd_attr="referral_number"> Call </a>

            </section>

            <section class="schedule">
                <span dd_display="schedule"> No schedule booked </span>
                <span> - Submitted <b dd_display="date"></b> </span>
            </section>

        </div>

    </section>

</section>