<div class="modal fade" tabindex="1" role="dialog" id="deleteUserModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-danger my-auto" style="font-size: 1.25rem;"></i>
                    Are you sure delete this user?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You can't undo this action</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <form id="delete-form" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn border bg-white" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
