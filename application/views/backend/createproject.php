<div class="row">
<div class="col s12">
<h4 class="pad-left-15">Create project</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createprojectsubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
<div class="input-field col s6">
<label for="Order">Order</label>
<input type="text" id="Order" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("status",$status,set_value('status'));?>
<label>Status</label>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Name">Name</label>
<input type="text" id="Name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Icon">Icon</label>
<input type="text" id="Icon" name="icon" value='<?php echo set_value('icon');?>'>
</div>
</div>
<!-- <div class="row">
<div class="col s12 m8">
<label for="Description">Description</label>
<textarea type="text" id="some-textarea" name="desc" value='<?php echo set_value('desc');?>'> </textarea>
</div>
</div> -->
<div class="row">
           <div class="col s12 m6">
               <label>Description</label>
               <textarea id="some-textarea" name="desc" placeholder="Enter text ...">
                   <?php echo set_value('desc');?>
               </textarea>
           </div>
       </div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewproject"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
