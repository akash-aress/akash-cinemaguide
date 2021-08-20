@extends('layouts.app')

@section('content')
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
              <li class="breadcrumb-item active">{{ __('Edit Movie') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                  <p>{{ $message }}</p>
              </div>
            @endif

          <form action="{{ route('movies.update',$movie->id ) }}" method="POST" id="updateMovieForm" enctype="multipart/form-data">
             @csrf
            {{ method_field('PUT') }}
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">{{ __('Edit Movie') }}</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
               <div class="form-new-outer">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="form-section-main">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="first_name">{{ __('Title') }} :</label>
                                 <input type="text" class="form-control" name="title" id="title" value="{{ $movie->title }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="last_name">{{ __('Parental Rating') }} :</label>
                                 <span class="asterisk">*</span>
                                 <select class="form-control" name="parental_rating">
                                    <option value="1" {{  $movie->parental_rating == 1 ? 'selected' : '' }}>{{ __('G') }}</option>
                                    <option value="2" {{  $movie->parental_rating == 2 ? 'selected' : '' }}>{{ __('PG') }}</option>
                                    <option value="3" {{  $movie->parental_rating == 3 ? 'selected' : '' }}>{{ __('M') }}</option>
                                    <option value="4" {{  $movie->parental_rating == 4 ? 'selected' : '' }}>{{ __('MA 15+') }}</option>
                                    <option value="5" {{  $movie->parental_rating == 5 ? 'selected' : '' }}>{{ __('R 18+') }}</option>
                                    <option value="6" {{  $movie->parental_rating == 6 ? 'selected' : '' }}>{{ __('X 18+') }}</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="first_name">{{ __('Movie length (minutes)') }} :</label>
                                 <input type="text" class="form-control" name="movie_length" id="movie_length" value="{{ $movie->movie_length }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="first_name">{{ __('Poster') }} :</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="poster" name="poster">
                                      <label class="custom-file-label" for="poster">Choose file</label>
                                    </div>
                                  </div>
                              </div>
                           </div>

                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                              @if(is_file('storage/app/public/movie-images/'.$movie->poster))
                                  <img src="{{ url('storage/app/public/movie-images/'.$movie->poster) }}" class="img-responsive" height="100" width="100">
                              @else
                                   <img src="{{ asset('images/default.jpg') }}" class="img-responsive" height="100" width="100">
                              @endif
                            </div>
                        </div>
                     </div>
                     <div class="row">
                       <div class="col-12">
                         <button type="submit" name="submit" class="btn btn-success">{{ __('Update Movie') }}</button>
                         <a href="{{ route('movies.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                       </div>
                     </div>
                  </div>
               </div>
            </div>
          </form>
         </div>
      </div>
   </div>
</section>
</div>
@endsection

@section('script')
<script src="{{ asset('js/movie.js') }}"></script>
@endsection
