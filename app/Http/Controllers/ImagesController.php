<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Album;
use App\Photo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{

  public function getForm($id)
  {
    $album = Album::find($id);
    return view('admin.addImage',[
      'album'=>$album
    ]);
    // return View::make('addimage')
    // ->with('album',$album);
  }

public function postAdd()
{
  $rules = array(

    'album_id' => 'required|numeric|exists:albums,id',
    'image'=>'required|image'

  );

  $validator = Validator::make(Input::all(), $rules);
  if($validator->fails()){

    return Redirect::route('add_image',array('id' =>Input::get('album_id')))
    ->withErrors($validator)
    ->withInput();
  }

  $file = Input::file('image');
  $fileName = $file->store('albums','public');
  //dd($fileName);
//*******************************<button mat-button [matMenuTriggerFor]="
$width = Image::make(Input::file('image'))->width();  
$height = Image::make(Input::file('image'))->height();  

$dif = $height - $width;
//dd($dif);

$nameSmall = substr($fileName,7,strpos($fileName,'.jpeg')-7).'400x500.jpeg';
$nameBig = substr($fileName,7,strpos($fileName,'.jpeg')-7).'768x960.jpeg';
$nameAdmin = substr($fileName,7,strpos($fileName,'.jpeg')-7).'150x188.jpeg';

if ($dif == 192) {
    $fileAdmin = Image::make(Input::file('image'))->resize(150, 188)->save('storage/albums/'.$nameAdmin);
    $fileSmall = Image::make(Input::file('image'))->resize(400, 500)->save('storage/albums/'.$nameSmall);
    $fileBig = Image::make(Input::file('image'))->resize(768, 960)->save('storage/albums/'.$nameBig);

} elseif( $width < 768 ) {   

    $fileBig = Image::make(Input::file('image'))->resize(768, null, function ($constraint) {
        $constraint->aspectRatio();
        })->crop(768, 960)->save('storage/albums/'.$nameBig);

    $fileSmall = Image::make(Input::file('image'))->resize(768, null, function ($constraint) {
        $constraint->aspectRatio();
        })->crop(768, 960)->resize(400, 500)->save('storage/albums/'.$nameSmall);    
    $fileAdmin = Image::make(Input::file('image'))->resize(768, null, function ($constraint) {
            $constraint->aspectRatio();
            })->crop(768, 960)->resize(150, 188)->save('storage/albums/'.$nameAdmin);        
        
}else{
    $fileBig = Image::make(Input::file('image'))->crop(768, 960)->save('storage/albums/'.$nameBig);
    $fileSmall = Image::make(Input::file('image'))->crop(768, 960)->resize(400,500)->save('storage/albums/'.$nameSmall);
    $fileAdmin = Image::make(Input::file('image'))->crop(768, 960)->resize(150,188)->save('storage/albums/'.$nameAdmin);
}

  Photo::create(array(
    'description' => Input::get('description'),
    'image' =>'albums/'.$nameBig, 
    'imageSmall' => 'albums/'.$nameSmall,
    'imageAdmin' => 'albums/'.$nameAdmin,
    'album_id'=> Input::get('album_id')
  ));

  return Redirect::route('album',array('id'=>Input::get('album_id')));
}
public function getDelete($id)
{
  $image = Photo::find($id);

  $image->delete();

  return Redirect::route('album',array('id'=>$image->album_id));
}
public function postMove()
{
  $rules = array(
    'new_album' => 'required|numeric|exists:albums,id',
    'photo'=>'required|numeric|exists:images,id'
  );
  $validator = Validator::make(Input::all(), $rules);
  if($validator->fails()){

    return Redirect::route('index');
  }
  $image = Photo::find(Input::get('photo'));
  $image->album_id = Input::get('new_album');
  $image->save();
  return Redirect::route('album',array('id'=>Input::get('new_album')));
}

 }
