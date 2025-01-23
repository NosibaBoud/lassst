@extends('index')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@section('content') 
<head>
  <title>My Tests</title>
  <!--styles-->
  <link href="/css/index.css" rel="stylesheet">
</head>
<div class="bg-white shadow">
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">My Tests</h1>
  </div>
</div>
  <body>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      @if(!empty($tests))
      @foreach($tests as $test)
          <div class="card">
              <div class="card-content">
                  <ul>{{ $test->investigation->name }} - {{ $test->investigation->price }}LD</ul>
                  <form action="{{ route('investigation.destroy', $test->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="remove-button" onclick="return confirm('Are you sure you want to remove this investigation?')">Remove</button>
                  </form>
              </div>
          </div>
      @endforeach
      @if($tests->count() > 0)
          <div>Total Cost: {{ $tests->sum(fn($t) => $t->investigation->price) }}LD</div>
          <form method="POST" action="{{ url('/makeappointment') }}">
              @csrf
              @method('GET')
              <button type="submit" class="btn btn-primary">Make Home Appointment</button>
          </form>
      @else
          <p>No tests selected yet.</p>
      @endif
  @endif
    </div>
  </body>
@endsection
