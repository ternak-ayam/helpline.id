<div class="modal fade" id="editTranslator" tabindex="-1" role="dialog" aria-labelledby="editTranslatorTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Translator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.user.translator.update', $translator->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="my-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $translator->name }}" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="my-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $translator->email }}" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="my-2">
                            <label for="language">Language</label>
                            <input type="text" name="language" id="language" class="form-control" value="{{ $translator->language }}" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="my-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="my-2">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100 mb-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
