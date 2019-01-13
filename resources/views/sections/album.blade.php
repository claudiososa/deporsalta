<div class="container">   
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
                <a href="{{route('addImage',['id'=>$album->id])}}"><button type="button"class="btn btn-primary btn-large">Agregar nueva imagen al Album</button></a>
                <a href="{{URL::route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are yousure?')"><button type="button"class="btn btn-danger btn-large">Borrar Album</button></a>                
              </div>
            </div>
  
          </div>
        </div>
      </div><!--/col-->
  
  </div>
  <hr> 
  
  <div class="row">
          @foreach($album->Photos as $photo)
            <div class="col-lg-3">
              <div class="thumbnail">
                {{-- <p>Fecha de creación:  {{ date("d F Y",strtotime($photo->created_at)) }}at {{ date("g:ha",strtotime($photo->created_at)) }}</p> --}}
                <img  alt="{{$album->name}}" src="{{Storage::disk('public')->url($photo->imageAdmin)}}">
                <div class="caption">
                  <p>{{$photo->description}}</p>  
                  <a href="{{route('deleteImage',['id'=>$photo->id])}}" onclick="returnconfirm('Are you sure?')"><button type="button"class="btn btn-danger btn-small">Borrar imagen</button></a>          
                </div>
              </div>
              <hr>
            </div>
  
          @endforeach
  </div>
</div>