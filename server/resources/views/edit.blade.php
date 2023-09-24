@extends('main')

@section('content')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.departments')</h3>
          <div class="breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('location.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('location.index')}}">@lang('admin.departments')</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">@lang('admin.edit')</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1" href="chat-application.html"><i class="ft-mail"></i> Email</a></div>
      </div>
      <div class="content-body">
<section id="basic-form-layouts">





  <div class="row match-height">

       <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title" id="basic-layout-round-controls"></h4>
                  <a class="heading-elements-toggle">
                      <i class="la la-ellipsis-v font-medium-3"></i>
                  </a>
                  <div class="heading-elements">
                      <ul class="list-inline mb-0">
                          <li>
                              <a data-action="collapse">
                                  <i class="ft-minus"></i>
                              </a>
                          </li>
                          <li>
                              <a data-action="reload">
                                  <i class="ft-rotate-cw"></i>
                              </a>
                          </li>
                          <li>
                              <a data-action="expand">
                                  <i class="ft-maximize"></i>
                              </a>
                          </li>
                          <li>
                              <a data-action="close">
                                  <i class="ft-x"></i>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="card-content collapse show">
                  <div class="card-body">

                      <div class="card-text"></div>

                      <form class="form" method="POST" action="{{ route('location.update', $location->id) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                          <div class="form-body">

                              <div class="mb-3">
                                    <label for="inputGroup-sizing-lg" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" aria-label="Sizing example input"  id="inputGroup-sizing-lg" value="{{$location->name}}" aria-describedby="inputGroup-sizing-lg">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                              </div>

                              <div class="mb-3">
                                  <label for="inputGroup-sizing-lg" class="form-label">Iframe</label>
                                  <input type="text" name="iframe" class="form-control" aria-label="Sizing example input"  id="inputGroup-sizing-lg" value="{{$location->iframe}}" aria-describedby="inputGroup-sizing-lg">
                                  @error('iframe')
                                  <div class="text-danger">{{ $message }}</div>
                                  @enderror
                              </div>

                              <div class="mb-3">
                                  <label for="inputGroup-sizing-lg" class="form-label">Country</label>
                                  <input type="text" name="country" class="form-control" aria-label="Sizing example input"  id="inputGroup-sizing-lg" value="{{$location->country}}" aria-describedby="inputGroup-sizing-lg">
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

                          <div class="form-actions">
                              <a href="{{ route('location.index') }}" type="button" class="btn btn-danger mr-1">
                                  <i class="ft-x"></i> Cancel
                              </a>
                              <button type="submit" class="btn btn-primary">
                                  <i class="la la-check-square-o"></i> Save
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
