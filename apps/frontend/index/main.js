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
}