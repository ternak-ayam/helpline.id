@extends('layouts.admin')

@section('title', 'City')

@section('css')

@endsection

@section('js')
{{-- <script>
        $('#detailPsychologist').modal('show');

        $(function () {
            const formSubmit = document.getElementById("delete-form");
            const deleteTranslatorSelector = $("#deletePsychologistModal");

            deleteTranslatorSelector.on("show.bs.modal", (e) => {
                formSubmit.action = route(
                    "admin.user.psychologist.destroy",
                    $(e.relatedTarget).data("id")
                );
            });

            deleteTranslatorSelector.on("hide.bs.modal", (e) => {
                formSubmit.action = "";
            });
        });
    </script> --}}
    <script>
  $(document).on('click', '#update_city',function(){
    let id = $(this).data('id');
    let name= $(this).data('name');
    let email = $(this).data('email');
    $('.modal-content #id').val(id);
    $('.modal-content #name').val(name);
    $('.modal-content #email').val(email);
  });

  function confirmdelete(){
        confirm("are you sure you delete the data ?");
  }
</script>
@endsection

@section('content')

<x-content>
    <x-slot name="modul">
        <h1>City</h1>
    </x-slot>

    <x-section>
        <x-slot name="title">
        </x-slot>

        <x-slot name="header">
            <h4>Data City</h4>
            <div class="card-header-form row">
                <div class="ml-2">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_city">
                        Add New City <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </x-slot>

        <x-slot name="body">
            <div class="table-responsive">
                <table class="table table-bordered  table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cities as $citie)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $citie->name }}</td>
                            <td>{{ $citie->email }}</td>
                            <td>
                                <a href="" data-toggle="modal" id="update_city" data-target="#modal_update_city" data-id='{{ $citie->id }}' data-name='{{ $citie->name }}' data-email='{{ $citie->email }}'
                                    class="btn btn-icon btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                </a>

                                <a  onclick="confirmdelete()" href="{{route('admin.city.list.delete'  ,['id' => $citie->id])}}"><button  class="btn btn-sm btn-danger delete">
                                    <i class="fas fa-trash"></i>
                                </button></a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="7">
                                <p class="text-center"><em>There is no record.</em></p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </x-slot>

        {{-- <x-slot name="footer">
            {{ $citie->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
        </x-slot> --}}
    </x-section>

</x-content>



<div class="modal fade" id="modal_add_city" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title">Add City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="p-4" action="{{ route('admin.city.list.create') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_update_city" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-8">
            <div class="modal-header">
                <h5 class="modal-title">Update City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="p-4" action="{{ route('admin.city.list.update') }}" method="post">
                @csrf
                <input type="hidden" type="text" name="id" id="id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
{{-- @include('admin.pages.psychologist.modals.delete')
@if(session('psychologist'))
    @include('admin.pages.psychologist.modals.detail', ['psychologist' => session('psychologist')])
@endif --}}
@endsection
