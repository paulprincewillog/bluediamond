function latest_update() {

    dd('#updates').fadeIn(500);
    dd_load({
        url: "app/index/announcement",
        target: "#updates",
        nodata: function() {
            dd("#updates p").html("No new updates so far");
            dd("#updates small").hide();
            dd("#updates .for_more").hide();
        }
    })
}