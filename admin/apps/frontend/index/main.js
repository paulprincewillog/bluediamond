window.addEventListener('load', function () {

    dd_ajax({
        url: "app/index/auto_login",
        if_successful: function() {
            load_admin();
            change_slide('#admin_dashboard');
        },
        if_not: function() { 
            dd("#admin_login").show();
        }
        
    })


    dd_submit({
        target: "#admin_login > form",
        url: "app/index/login",
        if_successful: function() {
            load_admin();
            change_slide('#admin_dashboard');
        }
    });
});

function load_admin() {

    // Adding event listeners
    dd("#admin_dashboard [name='check_numbers']").click(check_numbers);
    dd("#admin_dashboard [name='change_announcement']").click(change_annoucement);

    dd_load({
        url: "../app/index/announcement",
        target: "#post_announcement > form"
    });

    dd_submit({
        target: "#post_announcement > form",
        url: "app/index/post_announcement"
    });

}

function check_numbers() {

    dd_load({
        url: "app/index/check_numbers",
        target: "#all_numbers",
        amount: 8,
        pagination: 'yes'
    });

    change_slide("#check_numbers");
}

function change_annoucement() {
    change_slide("#post_announcement");
}


function change_slide(next_slide) {

    var prev_slide = dd(".active_admin_screen").select();

    if (next_slide == 'previous') {
        next_slide = prev_slide.getAttribute("backTo");
    }

    if (next_slide == "home") {
        // dd("#admin_section").fadeOut(500);
        return;
    }

    dd(prev_slide).fadeOut("500", function() {
        dd(next_slide).fadeIn("500");
    });

    prev_slide.classList.remove("active_admin_screen");
    dd(next_slide).select().classList.add("active_admin_screen");
}

