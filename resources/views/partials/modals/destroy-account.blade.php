<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        {!! Former::open()->action(route('user.destroy', $agent->id))->method('DELETE') !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Account</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your account?</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="delete_id" id="{{ $agent->id }}" value=""/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" id="confirm">Delete</button>
            </div>
            {!! Former::close() !!}

        </div>
    </div>
</div>