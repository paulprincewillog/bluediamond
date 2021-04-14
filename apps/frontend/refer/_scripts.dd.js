function dd_intialize() {
    // Whatever instruction you want to run instantly after the page loads goes here
    console.log("This page is now active");
}

// Every other instructions, variables, functions that will run later goes below

function submit_details(where_next) {

    dd("[name='prompt']").fadeOut(400);
    dd("[name='actions']").fadeOut(400);
    
    setTimeout(() => {
        dd("#submit_details").fadeIn(400);
    }, 600);

    // Remember where to go next after submitting form
    dd("[name='where_next']").val(where_next);
}


// function refer_parent() {

//     dd("#submit_details").fadeOut(400);
    
//     setTimeout(() => {
//         dd("#refer_parent").fadeIn(400);
//     }, 600);
// }


function refer_again() {

    dd("#refer_successful").fadeOut(400);
    
    setTimeout(() => {
        dd("#refer_parent").fadeIn(400);
        dd("#link_button").fadeIn(400);

    }, 600);
}


function refer_successful() {

    dd("#refer_parent").fadeOut(400);
    dd("#link_button").fadeOut(400);
    
    setTimeout(() => {
        dd("#refer_successful").fadeIn(400);
    }, 600);
}

function share_link() {
    
    dd("#refer_parent").fadeOut(400);
    dd("#link_button").fadeOut(400);
    dd("#refer_successful").fadeOut(400);

    setTimeout(() => {
        dd("#share_link").fadeIn(400);
        dd("#back_refer").fadeIn(400);
    }, 600);
}

function continue_refer() {
       
    dd("#refer_successful").fadeOut(400);

    setTimeout(() => {
        dd("#share_link").fadeIn(400);
        dd("#back_refer").fadeIn(400);
    }, 600);
}

function back_refer() {

    dd("#share_link").fadeOut(400);
    dd("#back_refer").fadeOut(400);
    
    setTimeout(() => {
        dd("#refer_parent").fadeIn(400);
        dd("#link_button").fadeIn(400);
    }, 600);

}

function back_share() {

    
    dd("#refer_parent").fadeIn(400);
    dd("#link_button").fadeIn(400);
    
    setTimeout(() => {  
        dd("#share_link").fadeOut(400);
        dd("#back_refer").fadeOut(400);
    }, 600);
}

function create_referral_link() {
    
    var phone_number = dd("[name='phone_number']").val();
    var link = "https://bluediamond.com.ng?ref="+phone_number;

    dd("[name='referral_link']").val(link);

    var caption = "Are you considering changing your child's school or just recently moved into Effurun environment? Then check out Blue Diamond schools. I am satisfied with my experience with them and personally recommend them. Use the link below to go through their website, and if you choose to register, the school will support you with 50% discount on your first term school fees.%0D%0A";
    var whatsapp_text = "https://wa.me/?text="+caption+link;
    var facebook_text = "https://facebook.com/sharer.php?u="+link+"&quote="+caption;
    dd("[name='facebook']").select().href = facebook_text;
    dd("[name='whatsapp']").select().href =  whatsapp_text;

}

function copy_link() {
    
    dd("#copied_message .successful").hide();
    dd("#copied_message .error").hide();

    var copyTextarea = document.querySelector("[name='referral_link']");
    copyTextarea.focus();
    copyTextarea.select();

    try {

        if (document.execCommand('copy')) {
            dd("#copied_message .successful").fadeIn(400);
        } else {
            dd("#copied_message .error").fadeIn(400);
        }
        
    } catch (err) {
        dd("#copied_message .error").fadeIn(400);
    }
}

dd_submit({
    target: '#submit_details > form',
    url: 'app/refer/submit_details',
    callback: function(data) {
        
        create_referral_link();

        var where_next = dd("[name='where_next']").val(); // Get where to go after submitting form
        dd("#submit_details").fadeOut(400); // Remove form
    
        setTimeout(() => {
            if (where_next == "refer") { 

                dd("#refer_parent").fadeIn(400);
                dd("#link_button").fadeIn(400);

            } else {
                
                // Show referral link by default
                dd("#share_link").fadeIn(400);
                dd("#back_refer").fadeIn(400);
            }

        }, 600);

        // Tell browser that user has typed in details already
        // localStorage.setItem("referral", "yes");
    }
});


dd_submit({
    target: '#refer_parent > form',
    url: 'app/refer/refer_parent',
    callback: function() {
        refer_successful();
    }
});