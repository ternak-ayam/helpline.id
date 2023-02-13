@extends('layouts.admin')

@section('title', 'City')

@section('css')

@endsection

@section('js')
<script>
  
    const btnAddCity = document.getElementById('btn_add_city');
    const city = document.getElementById('city');

    btnAddCity.addEventListener('click', (e) => {
        e.preventDefault()
        let cityContent = `<div class="form-inline">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input type="text" name="name[]" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                            placeholder="Name">
                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="email" name='email[]' class="form-control" id="inlineFormInputGroupUsername2"
                                placeholder="Email">
                        </div>
                        <button id="btn_remove_city" class="btn btn-danger mb-2">-</button>
                    </div> `;

            city.insertAdjacentHTML('beforeend', cityContent);
         })

    $(document).on('click', 'btn_remove_city', function(e) {
        e.preventDefault();
        let row_items = $(this).parent()
        $(row_items).remove();
    })

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
            <h4>Add Data City</h4>
            <div class="card-header-form row">
                <div>
                    <form>
                        <div class="input-group">
                            <input type="text" name="query" id="query" class="form-control" placeholder="Search"
                                value="{{ Request::input('query') ?? ''}}">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ml-2">
                    <a href="{{ route('admin.user.psychologist.create') }}" class="btn btn-sm btn-primary">
                        Add New City<i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </x-slot>

        <x-slot name="body">
            <div class="">
                <form action="">
                    <div class="form-inline">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                            placeholder="Name">
                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="email" class="form-control" id="inlineFormInputGroupUsername2"
                                placeholder="Email">
                        </div>
                        
                        <button id="btn_add_city" class="btn btn-primary mb-2">Add New City</button>
                    </div>
                    <div id="city"></div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </form>
            </div>
        </x-slot>

        {{-- <x-slot name="footer">
            {{ $citie->onEachSide(2)->appends($_GET)->links('admin.partials.pagination') }}
        </x-slot> --}}
    </x-section>

</x-content>
{{-- @include('admin.pages.psychologist.modals.delete')
@if(session('psychologist'))
    @include('admin.pages.psychologist.modals.detail', ['psychologist' => session('psychologist')])
@endif --}}
@endsection
