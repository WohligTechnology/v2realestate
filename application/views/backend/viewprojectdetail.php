<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch(" List of detailproject");?>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">ID</th>
<th data-field="projectimages">Project Image</th>
<th data-field="name">Name</th>
<th data-field="image">Image</th>
<th data-field="content">Content</th>
<th data-field="text">Text</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createdetailproject"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.projectimages + "</td><td>" + resultrow.name + "</td><td>" + resultrow.image + "</td><td>" + resultrow.content + "</td><td>" + resultrow.text + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editdetailproject?id=');?>"+resultrow.id+"'><i class='fa fa-pencil propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' o...(line truncated)...
}
generatejquery("<?php echo $base_url;?>");
</script>
