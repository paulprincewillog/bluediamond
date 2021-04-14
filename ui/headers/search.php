<form id="searchbox" action="<?php echo RELATIVE_ROOT;?>list" method="GET">
    
    <input type="text" name="find" placeholder="Search for a product" required>
    <?php include ROOT."ui/index/all_states.php"; ?>
    <button> <i class="pe-7s-search"></i> </button>
</form>