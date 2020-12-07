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

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
class FrontController extends Controller
{
    public function index()
    {
        $touristicPlaces = TouristicObj::orderBy('created_at', 'desc')->paginate(10);

        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
            $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
            unset($touristicPlace['province']);
            unset($touristicPlace['status']);

        });

        //dd($touristicPlaces->toArray());
        return view('admin.admin')
        ->with('places', $touristicPlaces);

    }

    public function registerNewPlace()
    {
        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $provinces = ProvinceObj::orderBy('provinceName', 'desc')->get();
        //dd($provinces[0]['provinceName']);
        return view('admin.places.registerPlace')
        ->with('tags', $tags)
        ->with('provinces', $provinces);

    }

    public function store(Request $request){
        return 'ok';
    }

    public function saveNewPlace(Request $request)
    {

        /*dd($request->file('image'));*/
        //dd($request->all());
        $data = $request->all();

        //image
        $file = $request->file('image');
        //crear nombres unicos a las imagenes
        $name = 'mainImage' . '.' . $file->getClientOriginalExtension();

        $provinceData = json_decode($data['inputPlaceProvince']);
        //dd($provinceData->provinceId);
        $newData['provinceId'] = $provinceData->provinceId;
        //TODO: sacar de sesion activa
        $newData['userId'] = '1';
        $newData['placeStatusId'] = '2';
        $newData['description'] = $data['inputPlaceDescription'];
        $newData['history'] = $data['inputPlacehistory'];
        $newData['placeName'] = $data['inputPlaceName'];
        $newData['mainImage'] = $name;
        $newData['mainVideo'] = '';
        $newData['businessHours'] = '';
        $newData['streets'] = $data['inputPlaceStreet'];
        $newData['latitude'] = (!is_null($data['inputPlaceLatitude'])) ? $data['inputPlaceLatitude']: 0.0;
        $newData['longitude'] = (!is_null($data['inputPlaceLongitude'])) ? $data['inputPlaceLongitude']: 0.0;
        $newData['type'] = $data['inputPlaceType'];

        $newPlace = new TouristicObj($newData);
        $newPlace->save();
        $newPlace->tag()->sync($data['inputPlaceTags']);
        //dd($newPlace);


        $path = public_path() . '/images/places/' . $newPlace['touristicPlaceId'] .'/';
        $file->move($path, $name);




        //dd($touristicPlaces->toArray());
        /*return view('admin.admin')
        ->with('places', $touristicPlaces);*/
        return redirect()->route('front.index');
    }



    public function users()
    {
        $userList = UserTableObj::orderBy('created_at', 'desc')->paginate(10);

        $userList->each(function($userList){
            $userList['nameType'] = $userList->userType['nameType'];
            unset($userList['userType']);

        });

        //dd($userList->toArray());

        //dd($touristicPlaces->toArray());
        return view('admin.users.users')
        ->with('users', $userList);

    }

    public function registerNewUser()
    {
        $userTypes = UserTypeObj::orderBy('nameType', 'desc')->get();
        //dd($provinces[0]['provinceName']);
        return view('admin.users.registerUser')
        ->with('userTypes', $userTypes);

    }


    public function saveNewUser(Request $request)
    {

        /*dd($request->file('image'));*/
        //dd($request->all());
        $data = $request->all();

        $newData['statusId'] = '2';
        $newData['typeId'] = $data['inputUserType'];
        $newData['name'] = $data['inputUserName'];
        $newData['lastName'] = $data['inputUserLastName'];
        $newData['email'] = $data['inputUserEmail'];
        $newData['password'] = bcrypt($data['inputUserPassword']);
        $newUser = new UserTableObj($newData);
        $newUser->save();

        return redirect()->route('front.users');
    }

    public function destroyUser($id){
        $user = UserTableObj::where('userId', '=', $id)->first();
        $user->delete();
        //dd($user);
        return redirect()->route('front.users');
    }

    public function userDetail($id){
        $user = UserTableObj::where('userId', '=', $id)->first();
        //dd($user);
        $userTypes = UserTypeObj::orderBy('nameType', 'desc')->get();
        $userStatus = StatusObj::orderBy('statusName', 'desc')->get();
        return view('admin.users.detailUser')
        ->with('user', $user)
        ->with('types', $userTypes)
        ->with('status', $userStatus);
    }

    public function saveUpdatedUser(Request $request){
        $data = $request->all();
        //dd($data);
        $user = UserTableObj::where('userId', '=', $data['userId'])->first();
        $newData['statusId'] = $data['inputUserStatus'];
        $newData['typeId'] = $data['inputUserType'];
        $newData['name'] = $data['name'];
        $newData['lastName'] = $data['lastName'];
        $newData['email'] = $data['email'];

        $user->fill($newData);
        $user->save();

        return redirect()->route('front.user.detail', ['id' => $data['userId']]);
    }

    public function placeDetail($id)
    {
        
        $touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();

        $galleryData = GalleryObj::where('touristicPlaceId', '=', $id)->first();
        
        if($galleryData){
            $galleryData->images;
        }
        
        //dd($galleryData->toArray());

        $touristicPlace->tag;
        $touristicPlace->gallery;
        
        $touristicPlace->gallery->each(function($galleryData){
            $galleryData->images;
        });

        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $provinces = ProvinceObj::orderBy('provinceName', 'desc')->get();
        //dd($provinces[0]['provinceName']);

        //dd($touristicPlace->toArray()['tag']);
        //dd($id);
        //dd($touristicPlace->toArray());
        //dd($touristicPlace['gallery'][0]['images']->toArray());//$gallery['images'][0]['imagePath']
        return view('admin.places.detailPlace')
        ->with('place', $touristicPlace)
        ->with('tags', $tags)
        ->with('provinces', $provinces);

    }


    public function destroyPlace($id)
    {
        $touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        $touristicPlace->delete();
        //dd($touristicPlace);
        return redirect()->route('front.index');

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


        return redirect()->route('front.placeDetail', ['id' => $touristicPlace->touristicPlaceId]);
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
        return redirect()->route('front.placeDetail', ['id' => $touristicPlaceId]);
    }

    public function editGallery($id)
    {
        
        $gallery = GalleryObj::where('galleryId', '=', $id)->first();
        $gallery->images;
        //dd($gallery->toArray());

        return view('admin.places.editGallery')
        ->with('gallery', $gallery);
    }

    public function saveUpdatedPlace(Request $request){

        $data = $request->all();
        $provinceData = json_decode($data['inputPlaceProvince']);
        //dd($data);

        $newData['touristicPlaceId'] = $data['touristicPlaceId'];
        $newData['provinceId'] = $provinceData->provinceId;
        $newData['history'] = $data['inputPlacehistory'];
        $newData['description'] = $data['inputPlaceDescription'];
        $newData['placeName'] = $data['placeName'];
        $newData['streets'] = $data['streets'];
        $newData['latitude'] = $data['inputPlaceLatitude'];
        $newData['longitude'] = $data['inputPlaceLongitude'];
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

        //dd($touristicPlace->toArray());
        return redirect()->route('front.placeDetail', ['id' => $data['touristicPlaceId']]);
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

        
        
        return redirect()->route('admin.gallery.edit', ['id' => $image['galleryId']]);
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


        return redirect()->route('admin.gallery.edit', ['id' => $data['galleryId']]);
    }
    
}
