@extends('layouts.admin')

@section('currentPage', __('Types'))

@section('content')
<a class="new_project btn text-black fw-bold mb-3" href="{{ route('admin.types.create') }}" role="button">New Type</a>

@if(session("message"))
<div class="alert alert-success" role="alert">
  <strong>{{ session("message") }}</strong>
</div>
@endif

<div class="table-responsive bg-black mb-5">
  <table class="table align-middle text-center mb-0">
    <thead>
      <tr class="align-middle">
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Projects</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($types as $type)
      <tr>
        <td scope="row" class="text-white">{{ $type->id }}</td>
        <td scope="row" class="text-white">{{ $type->name }}</td>
        <th scope="row" class="text-white">{{count($type->projects)}}</th>
        <td scope="row">
          <a class="show_button text-decoration-none btn" href="{{ route('admin.types.show', $type) }}">
            <i class="fa-regular fa-eye fa-fw"></i>
          </a>
          <a class="edit_button text-decoration-none btn my-2" href="{{ route('admin.types.edit', $type) }}">
            <i class="fa-regular fa-pen-to-square fa-fw"></i>
          </a>
          <button type="button" class="delete_button text-decoration-none btn">
            <i class="fa-regular fa-trash-can fa-fw"></i>
          </button>
        </td>
      </tr>
      @include("partials.typeDeletionModal")
      @empty
      <tr>
        <td class="text_custom_green" scope="row">No types found</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  {{ $types->links("pagination::bootstrap-5") }}
</div>
@endsection
