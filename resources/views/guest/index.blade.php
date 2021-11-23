@extends('layouts.frontoffice')

@section('pageContent')

  @foreach ($posts as $post)
    <div class="col">
      <div class="card shadow-sm mt-3">
        <img src="https://realfood.tesco.com/media/images/472x310-BBQ-jackfruit-c78e913d-6774-458f-a995-8d86eaf0a854-0-472x310.jpg" alt="Vegan Burger">
        
        <div class="card-body">
          <p class="card-text">{{$post['title']}}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
            </div>
            <small class="text-muted">9 mins</small>
          </div>
        </div>
      </div>
    </div> 
  @endforeach
  

@endsection