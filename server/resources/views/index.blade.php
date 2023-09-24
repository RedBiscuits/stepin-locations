
@extends('main')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">kimo</h3>
            </div>
        <div class="content-header-right col-md-4 breadcrumb-new">
        <a href="{{ route('location.create') }}"   class="mr-1 mb-1 btn btn-outline-info   float-end" style="float: inline-end;"> <i class="fas fa-plus"></i> Add Location</a>
        </div>

        </div>
        <div class="content-body">

    <section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <p class="card-text">   </p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <!-- <th>image</th> -->
                                        <th>iframe</th>
                                        <th>Country</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locations as $index => $location)


                                    <tr>
                                        <td>{{ $index + 1  }}</td>
                                        <td>{{ $location->name }}</td>
                                        <!-- <td><img src="{{ asset($location->image) }}" class="img-fluid" width="100"> </td> -->
                                        <td>{{ $location->iframe }}</td>
                                        <td>{{ $location->country }}</td>

                                        <td>
                                            <div class="btn-group mr-1 mb-1" bis_skin_checked="1">

                                                <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu" bis_skin_checked="1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(101px, 41px, 0px);">
                                                    <a class="dropdown-item" href="{{ route('location.edit',  $location->id) }}" bis_skin_checked="1"><i class="ft-edit"></i>update</a>
                                                    <div class="dropdown-divider" bis_skin_checked="1"></div>

                                                    <form method="POST" action="{{ route('location.destroy',  $location->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"  type="submit"  type="button"><i class="ft-trash"></i>Delete</a>
                                                    </form>

                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
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

@include('datatable')