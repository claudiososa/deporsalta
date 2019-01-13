<div class="container">
    <a class="btn btn-primary" href="{{route('createAlbum')}}">Crear Nuevo Album</a>
 </div>
 <div class="container">
   @forelse($albums as $album)
       <div class="row">
         <div class="col-md-12 mb30">
           <div class="card">
             <div class="card-top bg-info">
               <h4 class="card-title text-white">{{$album->name}}</h4>
             </div>
             <div class="card-content">
               <div class="row">
                 <div class="col-md-3">
                   <img height="150" width="200" alt="{{$album->name}}" src="/albums/{{$album->cover_image}}">
                 </div>
                 <div class="col-md-9">
                   <p>{{$album->description}}</p>
                   <p>{{count($album->Photos)}} fotos</p>
                   {{-- <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p> --}}
                   <p><a href="{{route('album',['id'=>$album->id])}}" class="btn btn-info mb5 btn-rounded">Ver galeria</a></p>
                 </div>
               </div>
 
             </div>
           </div>
         </div><!--/col-->
 
     </div>
 
   @empty
    <p>Vacio</p>
   @endforelse
 
 </div><!-- /.container -->