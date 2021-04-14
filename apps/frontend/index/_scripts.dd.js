
function cta(cta) {
    console.log(cta+" is called");
    var current_cta = dd(".current_cta");
    var next_cta = dd('#'+cta).select();

    if (cta == 'no') {
        dd("#cta").fadeOut('500');
    }

    else if(current_cta.select()) { // If we already had a current CTA

        // First, fade out current cta
        current_cta.fadeOut(500);
        dd("#cta").fadeIn(700);       

        // Wait till fadeIn is complete
        setTimeout(function() {

            // Remove 'current_cta' class from the element it is currently on
            current_cta.select().classList.remove('current_cta');
            next_cta.classList.add('current_cta');
            dd(next_cta).fadeIn(500);

        }, 700);

    } else {
        dd("#cta").fadeIn(1000);       
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
window.onload = function() {

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

    var active_cta = dd("#cta > [name='active_cta']").val();
    if (active_cta !='none') {
        setTimeout(() => {
            cta(active_cta);
        }, 1000);
    }

    dd("#iframe_map").select().src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.0235317057222!2d5.792473513560625!3d5.5635298959662585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1041adb341059367%3A0x85ef7875cfab9aab!2sBlue%20Diamond%20School!5e0!3m2!1sen!2sng!4v1600442938081!5m2!1sen!2sng";
    
};

// Every other instructions, variables, functions that will run later goes below

// Setting default variables
var announcement_has_been_closed = false;

// The next button that changes the slider
// function change_view(where) {
    
//     // First we check who is the current view
//     var current_element = dd(".current_view").select();

//     // Then we get the next and previous elements
//     var next_element = current_element.nextSibling;
//     var prev_element = current_element.previousSibling;
//     console.log("Next element is ");
//     console.log(next_element);

//     // Makes the whole screen blank so the change will be smooth
//     // Then make changes behind the blank screen
//     dd("#transition").fadeIn(500);

//     // Wait for another 5 secs to display, making sure change is smooth
//     setTimeout(function(){

//         // First, remove current view
//         current_element.classList.remove("current_view");

//         // Then decide if to go to next or previous element
//         if (where == "next") {
//             next_element.classList.add("current_view");
//         } else if (where == "previous") {
//             prev_element.classList.add("current_view");
//         }

//         dd("#transition").fadeOut(500);
//         dd("main").select().scrollIntoView();

//     }, 1000)

//     // Check if announcement has not been closed
//     // if (!announcement_has_been_closed) {
//     //     close_announcement();
//     // }

//     // Check if we have reached the contact page
//     if (next_element.id == "contact") {
//         setTimeout(() => { 
//             // If user has filled schedule form before, end cta
//             if (dd("#submit_number [name='schedule']").val() == 'set') {
//                 dd("#cta_success > p").html("Thank you so much for taking out the time to go through our website. We have taken note of your schedule and will call you soon.");
//                 cta('cta_success');
//             } else {   
//                 cta("cta_schedule"); // Open call to action again
//             }
//         }, 1000);
//     }
// }

var scrollElement = document.querySelector('#contact');
var scrollActivated = false;

// If we have reached the contact element, fade in CTA 
function displayCta(){

    if(scrollElement.getBoundingClientRect().top <= 0){
        // If user has filled schedule form before, end cta
        if (dd("#submit_number [name='schedule']").val() == 'set') {
            dd("#cta_success > p").html("Thank you so much for taking out the time to go through our website. We have taken note of your schedule and will call you soon.");
            cta('cta_success');
        } else {   
            cta("cta_schedule"); // Open call to action again
        }

        window.removeEventListener("scroll", displayCta); // STop scroll event if CTA has shown
    }
};

window.addEventListener("scroll", displayCta)

function close_announcement() {

    dd("#announcement").fadeOut(500);
    announcement_has_been_closed = true;

    // The homepage needs to be adjusted if announcement is closed
    // var top_description = dd("#top_description > div").select();
    // if (getComputedStyle(top_description).top > "15%") {
    //     top_description.style.top = "20%";
    //     dd("#top_description").select().style.height = "700px";
    // }
}

// dd_load({
//     url: "app/index/announcement",
//     target: "#announcement",
//     nodata: function() {
//         close_announcement();
//     }
// })


function open_admin() {

    if (dd("#admin_section").select()) {
        dd("#admin_section").fadeIn(500);
        return;
    }

    dd_ajax({
        url: 'admin',
        ready: function(data) {
            var container = document.createElement("div");
            container.innerHTML = data;
    
            var scripts = container.querySelectorAll("script");
            dd("main").select().appendChild(container);
    
            for (i=0; i < scripts.length; i++) {
                var url = scripts[i].src;
                loadScript(url);
            }
            
    
        }
    })
}

function loadScript(url) {
    var script = document.createElement("script"); // create a script tag
    script.src = url; // set the source of the script to your script
    dd("main").select().appendChild(script);
}function slide(next_view = '') {

    // First, get the current element
    var current_view = dd("#features .current_view");
    current_view.fadeOut(500);
    dd("#features").select().scrollIntoView();

    // If no next view, just go to next element
    if (next_view == '') {
        if (current_view.select().id == 'feature4') {
            // If this is the last child, restart
            var next_element = dd("#feature1").select();
        } else {
            var next_element = current_view.select().nextSibling;
        }
        
    } else {
        var next_element = dd("#features #"+next_view).select();
    }
    
    console.log(next_view);
    console.log(next_element);
    
    setTimeout(() => {    

        current_view.select().classList.remove("current_view"); // Remove current view
        next_element.classList.add("current_view"); // Add current view to next element

        dd(next_element).fadeIn(500); // Fade next element in

        dd("#features .current_slide").select().classList.remove("current_slide");
        dd("#features [data-slide='"+next_element.id+"']").select().classList.add("current_slide");
    }, 700);
}