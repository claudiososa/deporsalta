<div class="container">
    <div class="span4" style="display: inline-block;margin-top:100px;">

      <form name="createnewalbum" method="POST"action="{{URL::route('create_album')}}"enctype="multipart/form-data">
          {{csrf_field()}}
             <h2>Crear Album</h2>

             <div class="form-group">
               <label class="field">
                 <input name="name" type="text" class="form-control"placeholder="Nombre de Album"value="" required>
               </label>
             </div>
             <div class="form-group">
               <label class="field">
                 <textarea name="description" type="text"class="form-control" placeholder="Albumdescription"></textarea>
               </label>
             </div>
             <div class="form-group">
               <label for="cover_image">Seleccione Image identicatoria</label>
               {{Form::file('cover_image')}}
             </div>

             <button type="submit" class="btn btn-primary">Crear!</button>

         </form>
    </div>
  </div> <!-- /container -->
