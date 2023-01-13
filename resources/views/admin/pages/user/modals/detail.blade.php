<div class="modal fade" id="detailUser" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">User Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <div class="my-2">
                        <span>UNHCR Number</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $user->unhcr_number }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-top">
                    <div class="my-2">
                        <span>Email</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $user->email }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-top">
                    <div class="my-2">
                        <span>Country</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $user->country }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-top">
                    <div class="my-2">
                        <span>Birthdate</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $user->birthdate->format('F j, Y') }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-top">
                    <div class="my-2">
                        <span>Sex</span>
                    </div>
                    <div class="my-2">
                        <span>{{ Str::ucfirst($user->sex) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
