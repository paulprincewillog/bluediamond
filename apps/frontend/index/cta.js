window.addEventListener('load', function () {
    set_cta();
});

function set_cta() {
    
    // Activate CTA form
    dd_submit({
        target: "#submit_number > form",
        url: "app/index/submit_number",
        callback: function(e) {
            
            cta('cta_success');
            setTimeout(() => {
               cta('no'); 
            }, 5000);

            // Inform app that schedule is set so it doesn't bring the cta again
            if (dd("#submit_number [name='schedule']").val() !='none') {
                dd("#submit_number [name='schedule']").val("set");
            };
        }
    });

    // Display CTA immediately if available
    var active_cta = dd("#cta > [name='active_cta']").val();
    if (active_cta !='none') {
        setTimeout(() => {
            cta(active_cta);
        }, 3000);
    }


}

function cta(cta) {

    var current_cta = dd(".current_cta");
    var next_cta = dd('#'+cta).select();

    if (cta == 'no') {
        dd("#cta").fadeOut(400);
    }

    else if(current_cta.select()) { // If we already had a current CTA

        // First, fade out current cta
        current_cta.fadeOut(400);
        dd("#cta").show();       

        // Wait till fadeIn is complete
        setTimeout(function() {

            // Remove 'current_cta' class from the element it is currently on
            current_cta.select().classList.remove('current_cta');
            next_cta.classList.add('current_cta');
            dd(next_cta).fadeIn(400);

        }, 500);

    } else {
        dd("#cta").fadeIn(400);       
        next_cta.classList.add('current_cta');
        
    }
}

function cta_form(action) {
    
    if (action == "success") {
        dd("#submit_number > form [name='where_next']").val("success");
        dd("#submit_number > p").html("Please submit your phone number below and we'll call you to answer all your questions");
        dd("#cta_success > p").html("We have gotten your phone number and would call you as soon as possible. If you still have time, you can use the 'Facebook' link at the bottom to explore our page.");

    } else if (action == "continue") {
        dd("#submit_number > form [name='where_next']").val("success");
        dd("#submit_number > p").html("Please submit your phone number so we can call to make an arrangement");
        dd("#cta_success > p").html("We've taken note of your details, and will call you soon. Meanwhile, enjoy going through our website to see why our school stand out.");
    } else if (action == "end") {
        dd("#submit_number > form [name='where_next']").val("success");
        dd("#submit_number > p").html("Please submit your phone number so we can call to make an arrangement");
        dd("#cta_success > p").html("Thank you so much for taking out the time to go through our website. We will call you soon to discuss further.");
    }

    cta('submit_number');
}

function select_schedule(schedule) {
    dd_ajax({
        url: "app/index/schedule",
        data: "schedule="+schedule,
        method: "POST",
        expecting: "JSON",
        ready: function(response) {

            if (dd(response).isEmpty()) {
                // Save the schedule in the cta form
                dd("#submit_number [name='schedule']").val(schedule);
                cta_form('end');
            } else {
                dd("#cta_success > p").html("Thank you so much for taking out the time to go through our website. We have taken note of your schedule and will call you soon.");
                cta('cta_success');

                // Inform app that schedule is set so it doesn't bring the cta again
                dd("#submit_number [name='schedule']").val("set");
            }

        }
    })
}

// Check which CTA to load first
