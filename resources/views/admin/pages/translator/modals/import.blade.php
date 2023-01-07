<div class="modal fade" id="importTranslatorModal" tabindex="-1" role="dialog" aria-labelledby="importTranslatorModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <i class="fas fa-exclamation-triangle text-danger my-auto" style="font-size: 1.25rem;"></i>
                    Import format
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <p>Please use format below:</p>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Language</th>
                        <th>Password</th>
                    </tr>
                    <tr>
                        <td>Example</td>
                        <td>Example</td>
                        <td>Example</td>
                        <td>Example</td>
                    </tr>
                </table>
                <form action="{{ route('admin.user.translator.import') }}" method="post" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <input type="file" class="d-none" onchange="form.submit()" name="user_file" id="user_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
                    <label for="user_file" type="submit" class="btn btn-primary w-100 mb-2">Import Translator</label>
                </form>
            </div>
        </div>
    </div>
</div>
