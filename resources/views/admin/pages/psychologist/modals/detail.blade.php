<div class="modal fade" id="detailPsychologist" tabindex="-1" role="dialog" aria-labelledby="detailPsychologistTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Psychologist Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($psychologist->hasImage())
                    <div class="text-center mb-4">
                        <img width="120" height="120" class="rounded-circle" src="{{ $psychologist->getImageUrl() }}"
                             alt="Profile Picture">
                    </div>
                @endif
                <div class="d-flex justify-content-between border-bottom">
                    <div class="my-2">
                        <span>Name</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $psychologist->name }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-bottom">
                    <div class="my-2">
                        <span>Email</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $psychologist->email }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-bottom">
                    <div class="my-2">
                        <span>Bio</span>
                    </div>
                    <div class="my-2">
                        <span>{{ $psychologist->bio }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-bottom">
                    <div class="my-2">
                        <span>Education</span>
                    </div>
                    <div class="my-2">
                        @foreach($psychologist->educations as $education)
                            <div>
                                <span>{{ $education->major . ' - ' . $education->institution }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-between border-bottom">
                    <div class="my-2">
                        <span>Language</span>
                    </div>
                    <div class="my-2">
                        @foreach($psychologist->languages as $language)
                            <div>
                                <span>{{ $language->language }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
