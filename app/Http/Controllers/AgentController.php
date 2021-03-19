<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TouristicPlace as TouristicObj;
use App\UserTable as UserTableObj;
use App\UserType as UserTypeObj;
use App\Images as ImagesObj;
use App\Tag as TagObj;
use App\Province as ProvinceObj;
use App\Favorite as FavObj;
use App\Rate as RateObj;
use App\Gallery as GalleryObj;
use App\Images as ImageObj;
use App\Status as StatusObj;
use App\Category as CategoryObj;
use App\Commentary as CommentaryObj;

use laracasts\flash\flash;

class AgentController extends Controller
{
    
    public function index()
    {
        $user = \Auth::user();
        $touristicPlaces = TouristicObj::where('userId', '=', $user['userId'])->get();
        //dd($touristicPlaces);
        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
            $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
            $touristicPlace['commentaryCount'] = $touristicPlace->commentary->count();
            $touristicPlace['galleryCount'] = $touristicPlace->gallery->count();
            $touristicPlace['favoriteCount'] = $touristicPlace->favorite->count();
            unset($touristicPlace['province']);
            unset($touristicPlace['status']);

        });

        //dd($touristicPlaces->toArray());
        return view('agent.agent')
        ->with('places', $touristicPlaces)
        ->with('user', $user);
        //flash("Se ha creado el articulo ". " de forma satisfactoria!",'success');
        //return $this->returnAdminView();

    }

    public function agentProfile()
    {
        $user = \Auth::user();

        $userData = UserTableObj::where('userId', '=', $user['userId'])->first();

        //dd($touristicPlaces->toArray());
        return view('agent.profile')
        ->with('user', $userData);
        //flash("Se ha creado el articulo ". " de forma satisfactoria!",'success');
        //return $this->returnAdminView();

    }

    public function updateAgent(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $user = UserTableObj::where('userId', '=', $data['inputId'])->first();

        $userEmail = UserTableObj::where([
            ['email', '=', $data['inputEmail']],
            ['userId', '!=', $data['inputId']]
        ])->first();

        if(isset($userEmail)){
            flash('El correo electronico ya esta en uso!')->warning();
            return redirect()->route('frontAgent.profile', ['id' => $user['userId']]);
        }

        $userData['email'] = $data['inputEmail'];
        $userData['name'] = $data['inputName'];
        $userData['lastName'] = $data['inputLastName'];
        $userData['phoneNumber'] = $data['inputPhone'];

        $user->fill($userData);
        $user->save();

        flash('Se actualizo el perfil de usuario!')->success();
        return redirect()->route('frontAgent.profile', ['id' => $user['userId']]);
    }

    public function placeDetail($id){
        $user = \Auth::user();

        $touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        $categories = CategoryObj::orderBy('categoryName', 'desc')->get();
        $galleryData = GalleryObj::where('touristicPlaceId', '=', $id)->first();
        
        if($galleryData){
            $galleryData->images;
        }
                

        $touristicPlace->tag;
        $touristicPlace->category;
        $touristicPlace->gallery;
        $touristicPlace->commentary;
        $touristicPlace->user;
        
        $touristicPlace->gallery->each(function($galleryData){
            $galleryData->images;            
        });

        $touristicPlace->commentary->each(function($commentaryData){
            $commentaryData->user;            
        });

        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $provinces = ProvinceObj::orderBy('provinceName', 'desc')->get();


        return view('agent.agentDetailPlace')
        ->with('place', $touristicPlace)
        ->with('tags', $tags)
        ->with('provinces', $provinces)
        ->with('categories', $categories)
        ->with('user', $user);
    }

    public function saveUpdatedPlace(Request $request)
    {

        $data = $request->all();
        $provinceData = json_decode($data['inputPlaceProvince']);
        //dd('otro metodo');

        $newData['touristicPlaceId'] = $data['touristicPlaceId'];
        $newData['provinceId'] = $provinceData->provinceId;
        $newData['history'] = $data['inputPlacehistory'];
        $newData['description'] = $data['inputPlaceDescription'];
        $newData['placeName'] = $data['placeName'];
        $newData['streets'] = $data['streets'];
        $newData['latitude'] = $data['inputPlaceLatitude'];
        $newData['longitude'] = $data['inputPlaceLongitude'];
        $newData['placeStatusId'] = $data['statusRadio'];

        //dd($newData);

        $touristicPlace = TouristicObj::find($data['touristicPlaceId']); 

        if($file=$request->file('image')){
            //dd('se actualizara la imagen ');
            if (\Storage::exists(public_path(). '/images/places/' . $touristicPlace['touristicPlaceId'] . '/' .$touristicPlace['mainImage'])) \Storage::delete(public_path(). '/images/places/' . $touristicPlace['touristicPlaceId'] . '/' .$touristicPlace['mainImage']);
            $name = 'mainImage' . '.' . $file->getClientOriginalExtension();
            $newData['mainImage'] = $name;
            $path = public_path() . '/images/places/' . $touristicPlace['touristicPlaceId'] .'/';
            $file->move($path, $name);
        }

        $touristicPlace->fill($newData);
        $touristicPlace->save();
        $touristicPlace->tag()->sync($data['inputPlaceTags']);

        if(isset($data['inputPlaceCategories'])) {
            $touristicPlace->category()->sync($data['inputPlaceCategories']);    
        }

        
        

        //dd($touristicPlace->toArray());
        flash('El registro se actualizó con éxito!')->success();
        return redirect()->route('frontAgent.placeDetail', ['id' => $data['touristicPlaceId']]);
        /*$viewData = $this->returnToDetailPlaceView($data['touristicPlaceId'], true);
        //dd($data);

        return view('admin.places.detailPlace')
        ->with('place', $viewData['place'])
        ->with('tags', $viewData['tags'])
        ->with('provinces', $viewData['provinces'])
        ->with('categories', $viewData['categories'])
        ->with('message', $viewData['message']);*/
    }

    public function createGallery(Request $request)
    {
        $data=$request->all();
        $touristicPlace = json_decode($data['inputPlace']);

        $newData['touristicPlaceId'] = $touristicPlace->touristicPlaceId;
        $newData['galleryName'] = $data['galleryName'];
        $newData['galleryPath'] = 'images/places/'. $touristicPlace->touristicPlaceId . '/galleries';
        $newGallery = new GalleryObj($newData);
        //dd($newGallery);//galerries/1/
        $newGallery->save();

        $newData['galleryPath'] = 'images/places/'. $touristicPlace->touristicPlaceId . '/galleries/'. $newGallery->galleryId;
        $newGallery1 = GalleryObj::find($newGallery->galleryId); 
        $newGallery1->fill($newData);
        $newGallery1->save();


        if($files=$request->file('images')){
            //dd($files);
            foreach($files as $file){
                $name = $file->getClientOriginalName(). $newGallery->galleryId . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path() . '/images/places/' . $touristicPlace->touristicPlaceId .'/galleries/'.  $newGallery->galleryId . '/';
                $file->move($path,$name);
                
                $newImage['galleryId'] = $newGallery->galleryId;
                $newImage['imagePath'] = $name;
                $storedImage = new ImageObj($newImage);
                $storedImage->save();
                
            }
        }

        flash('Se creo la galería ' . $data['galleryName'] . ' !')->success();
        return redirect()->route('frontAgent.placeDetail', ['id' => $newGallery1['touristicPlaceId']]);
    }

    public function editGallery($id)
    {
        $user = \Auth::user();
        //dd(phpinfo());
        $gallery = GalleryObj::where('galleryId', '=', $id)->first();
        $gallery->images;
        //dd($gallery->toArray());

        return view('agent.agentEditGallery')
        ->with('gallery', $gallery)
        ->with('user', $user);
    }

    public function createImage(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $gallery = GalleryObj::where('galleryId', '=', $data['galleryId'])->first();

        $newData['galleryName'] = $data['galleryName'];

        $gallery->fill($newData);
        $gallery->save();

        if($files=$request->file('images')){
            //dd($files);
            foreach($files as $file){
                $name = $file->getClientOriginalName(). $gallery['galleryId'] . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path(). '/' . $gallery['galleryPath'] . '/';
                $file->move($path,$name);
                
                $newImage['galleryId'] = $gallery->galleryId;
                $newImage['imagePath'] = $name;
                $storedImage = new ImageObj($newImage);
                $storedImage->save();
                
            }
        }

        flash('La galería se actualizó correctamente!')->success();
        return redirect()->route('frontAgent.galleryEdit', ['id' => $data['galleryId']]);
    }

    public function destroyGalleryImage($id)
    {
        
        $image = ImageObj::where('imageId', '=', $id)->first();

        $images = ImageObj::where('galleryId', '=', $image['galleryId'])->get();

        if(count($images->toArray()) > 1){
            $gallery = GalleryObj::where('galleryId', '=', $image['galleryId'])->first();
            //dd(\File::exists(public_path(). '/' . $gallery['galleryPath'] . '/' . $image['imagePath']));
            if (\File::exists(public_path(). '/' . $gallery['galleryPath'] . '/' . $image['imagePath'])) \File::delete(public_path(). '/' . $gallery['galleryPath'] . '/' . $image['imagePath']);
            //dd($gallery->toArray());
            $image->delete();
        }

        
        flash('Se eliminó la imagen correctamente!')->warning();
        return redirect()->route('frontAgent.galleryEdit', ['id' => $image['galleryId']]);
    }

    public function destroyGallery($id)
    {
        //dd($id);
        $gallery = GalleryObj::where('galleryId', '=', $id)->first();
        $touristicPlaceId = $gallery['touristicPlaceId'];
        //dd(public_path(). '/' .$gallery['galleryPath']);


        if (\File::exists(public_path(). '/' .$gallery['galleryPath'])) \File::deleteDirectory(public_path(). '/' .$gallery['galleryPath']);
        $gallery->images;
        //dd($gallery->toArray());
        $gallery->delete();

        /*flash("El articulo  ". $article->title . " se ha eliminado",'success');*/
        flash('Se eliminó correctamente la galería!')->warning();
        return redirect()->route('frontAgent.placeDetail', ['id' => $touristicPlaceId]);
    }

    public function destroyCommentary($id){
        //dd($id);
        $commentary = CommentaryObj::where('commentaryId', '=', $id)->first();
        $touristicPlaceId = $commentary['touristicPlaceId'];
        $commentary->delete();
        //dd($TagObj);
        flash('Comentario eliminado!')->warning();
        return redirect()->route('frontAgent.placeDetail', ['id' => $touristicPlaceId]);

    }
}
