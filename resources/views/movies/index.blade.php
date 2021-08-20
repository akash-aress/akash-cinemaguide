@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Movie') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ __('Movie') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

          @if ($message = Session::get('success'))
              <div class="alert alert-success">

                  <p>{{ $message }}</p>

              </div>
          @endif
            </div>
          </div>
      </div>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-new">
              <div class="datatable-new-top">
                <div class="row">
                  <div class="col-sm-12 col-md-6">

                  </div>
                  <div class="col-sm-12 col-md-6 text-right">
                    <a href="{{ route('movies.create') }}" class="red-button">{{ __('Add Movie') }}</a>
                  </div>
                </div>
              </div>
              <div class="datatable-new-outer">
                <div class="card">
                  <!-- /.card-header -->
                  <table id="news_list" class="table">
                    <thead>
                      <tr>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('Poster') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Parental Rating') }}</th>
                        <th>{{ __('Movie Length') }}</th>
                        <th>{{ __('Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                      @if(!empty($movies) && $movies->count())
                        @foreach($movies as $key => $movie)
                          <tr>
                          @if( request()->page )
                            <td>{{ $movies->currentPage() * $movies->perPage() - $movies->perPage() + $i++ }}</td>
                          @else
                            <td>{{ $i++}}</td>
                          @endif
                            <td>
                          @if(is_file('storage/app/public/movie-images/'.$movie->poster))
                              <img src="{{ url('storage/app/public/movie-images/'.$movie->poster) }}" class="img-responsive" height="50" width="50">
                          @else
                               <img src="{{ asset('images/default.jpg') }}" class="img-responsive" height="50" width="50">
                          @endif
                            </td>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->parental_rating }}</td>
                            <td>{{ $movie->movie_length }}</td>
                            <td>
                              <form action="{{ route('movies.destroy',$movie->id) }}" method="POST" >  
                                <a class="btn btn-info btn-sm" href="{{ route('movies.edit',$movie->id) }}"><i class="fas fa-pencil-alt">
                                </i>Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Record?');"><i class="fas fa-trash"></i>Delete</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="10">{{ __('There are no data.') }}</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>

                  <!-- /.card-body -->
                </div>
                  {{-- Pagination --}}
                  <div class="row">
                    <div class="col-12">
                    {{ $movies->links('pagination::bootstrap-4') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Delete Modal HTML -->
    <div id="deleteModal" class="modal fade">
      <div class="modal-dialog">
        <form method="post">
          @csrf
          @method('DELETE')
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">This action is not reversible.</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the record?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-white" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </form>
        <!-- /.modal-content -->
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
  <script>
    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var action = button.data('action');
      var modal = $(this);
      modal.find('form').attr('action', action);
    });
  </script>
@endsection