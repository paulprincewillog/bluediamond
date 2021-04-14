function slide(next_view = '') {

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