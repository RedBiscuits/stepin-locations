@extends('main')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Creat new location</h3>
        </div>
        <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1" href="chat-application.html"><i class="ft-mail"></i> Email</a></div>
      </div>
      <div class="content-body">
<section id="basic-form-layouts">


  <div class="row match-height">

       <div class="col-md-6">
          <div class="card">


              <div class="card-content collapse show">
                  <div class="card-body">

                      <div class="card-text"></div>

                      <form class="form" method="POST" action="{{ route('location.store') }}" enctype="multipart/form-data">
                        @csrf

                          <div class="form-body">

                              <div class="form-group">

                                <div class="mb-3">
                                    <label for="inputGroup-sizing-lg" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" aria-label="Sizing example input"  id="inputGroup-sizing-lg" aria-describedby="inputGroup-sizing-lg">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="mb-3">
                                    <label for="inputGroup-sizing-lg" class="form-label">Iframe</label>
                                    <input type="text" name="iframe" class="form-control" aria-label="Sizing example input"  id="inputGroup-sizing-lg" aria-describedby="inputGroup-sizing-lg">
                                    @error('iframe')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>

                                <div class="mb-3">
                                    <label for="inputGroup-sizing-lg" class="form-label">Country</label>
                                    <input type="text" name="country" class="form-control" aria-label="Sizing example input"  id="inputGroup-sizing-lg" aria-describedby="inputGroup-sizing-lg">
                                    @error('country')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>

                                  <!-- <div class="mb-3 custom-file">
                                      <input type="file" class="custom-file-input" id="formFile" name="image" accept="image/*">
                                      <label class="custom-file-label" id="selectedFileLabel" for="formFile">Choose an image file</label>
                                      @error('image')
                                      <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>

                                  <script>
                                  document.getElementById('formFile').addEventListener('change', function() {
                                      var selectedFile = this.value.split('\\').pop();
                                      document.getElementById('selectedFileLabel').textContent = selectedFile;
                                  });
                                  </script> -->

                              </div>

                          </div>

                          <div class="form-actions">
                              <a href="{{ route('location.index') }}" type="button" class="btn btn-danger mr-1">
                                  <i class="ft-x"></i> Cancel
                              </a>
                              <button type="submit" name="submit" class="btn btn-primary">
                                  <i class="la la-check-square-o"></i> Create
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>



</section>
       </div>
    </div>
  </div>

@endsection
