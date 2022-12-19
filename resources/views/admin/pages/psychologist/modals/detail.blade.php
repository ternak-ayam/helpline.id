<div class="modal fade" id="detailPsychologist" tabindex="-1" role="dialog" aria-labelledby="detailPsychologistTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Psychologist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between border-top">
                    <div class="my-2">
                        <span>Name</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $psychologist->name }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-top">
                    <div class="my-2">
                        <span>Email</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $psychologist->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
