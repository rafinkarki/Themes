<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<div id="imaginary_container"> 
	<form role="search" class="input-group stylish-input-group" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" name="s" class="form-control"  placeholder="Search" >
    <span class="input-group-addon">
        <button type="submit">
            <span class="glyphicon glyphicon-search"></span>
        </button>  
    </span>
	</form>
</div>
