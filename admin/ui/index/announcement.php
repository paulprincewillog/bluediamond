<section id="post_announcement" backTo="#admin_dashboard">
    
    <form method="POST" action="app/admin/post_announcement">
        <label for="announcement"> Content </label>
        <textarea name="announcement" placeholder="Type in announcement here" rows="7" max-length="160" dd_display="content"></textarea>

        <label for="link"> Link </label>
        <input type="text" name="link" placeholder="Link to click on (if any)" dd_display="link">
        <button type="submit"> Update announcement</button>

    </form>
        
</section>
