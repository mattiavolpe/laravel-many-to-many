@extends('layouts.admin')

@section('currentPage', __('View project'))

@section('content')

<div class="show_page pb-5">
  @if(session("message"))
  <div class="alert alert-success" role="alert">
    <strong>{{ session("message") }}</strong>
  </div>
  @endif
  
  <div class="card border-0 overflow-hidden">
      <div class="card-header text-black">
          <h2 class="mb-0 fw-bold">Project #{{$project->id}}</h2>
      </div>
      <div class="card-body bg-black text-white">
          <h4>./Project name:
            <br>
            <span class="fw-normal">{{$project->name}}</span>
          </h4>
          <hr>
          @if($project->image)
          <h4>./Project image:</h4>
          <img width="100%" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }} image">
          <hr>
          @endif
          <h4>./Repository URL:
            <br>
            <a href="{{ $project->repositoryUrl }}" target="_blank" class="text-white">{{ $project->repositoryUrl }}</a>
          </h4>
          <hr>
          <h4>./Project starting date:
            <br>
            <span class="fw-normal">{{$project->starting_date}}</span>
          </h4>
          @if($project->type)
          <hr>
          <h4>./Project type:
            <br>
            <span class="fw-normal">{{$project->type?->name}}</span>
          </h4>
          @endif
          @if(count($project->technologies) > 0)
          <hr>
          <h4>./Project technologies:
            @foreach($project->technologies as $technology)
            <br>
            <span class="fw-normal">{{$technology->name}}</span>
            @endforeach
          </h4>
          @endif
      </div>
  </div>
</div>
@endsection
