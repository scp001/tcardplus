<div class="modal fade" id="tip-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Warning</h4>
			</div>
			<div class="modal-body">
			Are you sure you wish to cancel?
			If you cancel, any unsaved changes will be permanently lost. Do you still wish to continue?
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-default" id="save">Save</button>-->
				<button type="button" class="btn btn-default" data-dismiss="modal">No, stay on this page!</button>
				<a type="button" class="btn btn-info" id="warning-modal-cancel" href="{{ URL::to('/')}}/forms/1">Yes, continue</a>
			</div>
		</div>
	</div>
</div>
