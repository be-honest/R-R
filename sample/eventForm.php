<style type="text/css">
.container{
    margin-left: auto;
    margin-right: auto;
    width: 300px;
}
.box1, .box2 {
    width:280px;
    height:auto;
    float:left;
    margin-bottom:10px;
    padding:10px;
    border:1px solid #888;
}
.box1 {
    clear:left;
    margin-right:10px;
}
.clear {
    clear:both;
}
</style>



<div id="container">
    <div class="box1">
       Enter box 1 content here.
    </div>
    <div class="box2">
       Enter box 2 content here.
    </div>
    <div class="clear"></div>
</div>

	<form >
		<fieldset>
			<legend>Event Form</legend>
				<div class="form-group">
					<label for="col-md-4 control-label" for="event_name">Name</label>
						<div class="col-md-4">
							<input id="event_name" name="event_name" type="input" placeholder="Event Name" class="form-control input-md">

						</div>
				</div>
		</fieldset>
	</form>


