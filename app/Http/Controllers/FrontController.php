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
use App\Product as ProductObj;
use App\Action as ActionObj;

use laracasts\flash\flash;
use Request as RequestObj;

use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationEmail;
use App\Mail\ConfirmationEmail;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class FrontController extends Controller
{
    public function index($status = "noData")
    {
        /*$touristicPlaces = TouristicObj::orderBy('touristicPlaceId', 'asc')->paginate(10);

        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
            $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
            unset($touristicPlace['province']);
            unset($touristicPlace['status']);

        });

        $message = null;
        //dd($this->statusMessage);
        if($this->statusMessage == "success"){
            $message = "El registro se guardó con éxito!";
            $this->statusMessage = "noData";
        }
        //dd($touristicPlaces->toArray());
        return view('admin.admin')
        ->with('places', $touristicPlaces)
        ->with('message', $message);*/
        //flash("Se ha creado el articulo ". " de forma satisfactoria!",'success');
        return $this->returnAdminView();

    }

    public function returnAdminView(){
        $user = \Auth::user();
        $touristicPlaces = TouristicObj::orderBy('touristicPlaceId', 'asc')->paginate(10);
        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
            $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
            unset($touristicPlace['province']);
            unset($touristicPlace['status']);

        });

        $users = UserTableObj::orderBy('userId', 'asc')->get();
        $tags = TagObj::orderBy('tagId', 'asc')->get();
        $categories = CategoryObj::orderBy('categoryId', 'asc')->get();

        //dd($touristicPlaces->toArray());        
        //flash("Se ha creado el articulo ". " de forma satisfactoria!",'success');
        return view('admin.admin')
        ->with('places', $touristicPlaces)
        ->with('cardPlaces', $touristicPlaces->sortBy(['rateAvg', 'desc'])->slice(0, 4))
        ->with('user', $user)
        ->with('users', $users)
        ->with('tags', $tags)
        ->with('categories', $categories);
    }

    public function listPlaces()
    {
        $user = \Auth::user();
        $touristicPlaces = TouristicObj::orderBy('touristicPlaceId', 'asc')->get();

        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
            $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
            unset($touristicPlace['province']);
            unset($touristicPlace['status']);

        });
  
        //dd($provinces[0]['provinceName']);
        return view('admin.places.listPlaces')
        ->with('places', $touristicPlaces)
        ->with('user', $user);

    }

    public function registerNewPlace()
    {
        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $provinces = ProvinceObj::orderBy('provinceName', 'desc')->get();
        $categories = CategoryObj::orderBy('categoryName', 'desc')->get();   
        //dd($provinces[0]['provinceName']);
        return view('admin.places.registerPlace')
        ->with('tags', $tags)
        ->with('provinces', $provinces)
        ->with('categories', $categories);

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

        if($data['inputPlaceType'] == 'event'){
            $newData['startDate'] = $data['startDate'];
            $newData['endDate'] = $data['endDate'];
        }

        $newPlace = new TouristicObj($newData);
        $newPlace->save();
        
        $newPlace->tag()->sync($data['inputPlaceTags']);
        if(isset($data['inputPlaceCategories'])) {
            $newPlace->category()->sync($data['inputPlaceCategories']);    
        }
        
        //dd($newPlace);


        $path = public_path() . '/images/places/' . $newPlace['touristicPlaceId'] .'/';
        $file->move($path, $name);


        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Registro', 'Lugar Turistico', '', json_encode($newPlace));
        //dd($touristicPlaces->toArray());
        /*return view('admin.admin')
        ->with('places', $touristicPlaces);*/
        flash('El registro se guardó con éxito!')->success();
        return redirect()->route('front.places');
    }



    public function users()
    {
        $userList = UserTableObj::orderBy('created_at', 'desc')->get();

        $userList->each(function($userList){
            $userList['nameType'] = $userList->userType['nameType'];
            $userList['statusName'] = $userList->status['statusName'];
            unset($userList['userType']);
            unset($userList['status']);

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
        $userCreated = UserTableObj::where('email', '=', $data['inputUserEmail'])->first();

        if(isset($userCreated)){
            flash('El correo '. $data['inputUserEmail'] . ' ya esta en uso!')->error();
            return redirect()->route('front.newUser');
        }

        $newData['statusId'] = '2';
        $newData['typeId'] = $data['inputUserType'];
        $newData['name'] = $data['inputUserName'];
        $newData['lastName'] = $data['inputUserLastName'];
        $newData['email'] = $data['inputUserEmail'];
        $newData['password'] = bcrypt($data['inputUserPassword']);
        $newUser = new UserTableObj($newData);
        $newUser->save();
        $newUser->userType;

        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Registro', 'Usuario', '', json_encode($newUser));

        flash('El usuario '. $newData['name']. ' ' .$newData['lastName'] . ' se creó correctamente!')->success();
        return redirect()->route('front.users');
    }

    public function destroyUser($id){
        $user = UserTableObj::where('userId', '=', $id)->first();
        $user->userType;
        $authUser = \Auth::user();
        $this->saveLogAction($authUser['userId'], 'Eliminar', 'Usuario', json_encode($user), '');

        $touristicPlaces = TouristicObj::where('userId', '=', $id)->get();                

        foreach($touristicPlaces as $touristicPlace){
            
            //dd($touristicPlace);
            $newData['userId'] = null;
            $touristicPlace->fill($newData);
            $touristicPlace->save();
        }

        //dd($user);
        $user->delete();
        //dd($user);
        flash('El usuario se eliminó correctamente!')->warning();
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

        $oldUser = UserTableObj::where('email', '=', $data['email'])->first();
        if(isset($oldUser)) {
            $oldUser->userType;
        }
        $userCreated = UserTableObj::where('email', '=', $data['email'])->first();

        if(isset($userCreated) && $userCreated['userId'] != $data['userId']){
            flash('El correo '. $data['email'] . ' ya esta en uso!')->error();
            return redirect()->route('front.user.detail', ['id' => $data['userId']]);
        }

        $user = UserTableObj::where('userId', '=', $data['userId'])->first();
        $newData['statusId'] = $data['inputUserStatus'];
        $newData['typeId'] = $data['inputUserType'];
        $newData['name'] = $data['name'] ? $data['name'] : $user['name'];
        $newData['lastName'] = $data['lastName'] ? $data['lastName'] : $user['lastName'];
        $newData['email'] = $data['email'];

        $user->fill($newData);
        $user->save();
        $user->userType;

        $authUser = \Auth::user();
        $this->saveLogAction($authUser['userId'], 'Edición', 'Usuario', json_encode($oldUser), json_encode($user));

        flash('El usuario se actualizó correctamente!')->success();
        return redirect()->route('front.user.detail', ['id' => $data['userId']]);
    }

    public function placeDetail($id)
    {
        
        /*$touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        $categories = CategoryObj::orderBy('categoryName', 'desc')->get();
        $galleryData = GalleryObj::where('touristicPlaceId', '=', $id)->first();
        
        if($galleryData){
            $galleryData->images;
        }
                

        $touristicPlace->tag;
        $touristicPlace->category;
        $touristicPlace->gallery;
        $touristicPlace->commentary;
        
        $touristicPlace->gallery->each(function($galleryData){
            $galleryData->images;            
        });

        $touristicPlace->commentary->each(function($commentaryData){
            $commentaryData->user;            
        });

        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $provinces = ProvinceObj::orderBy('provinceName', 'desc')->get();
        //dd($provinces[0]['provinceName']);

        //dd($touristicPlace->toArray()['tag']);
        //dd($id);
        //dd($touristicPlace->toArray());
        //dd($touristicPlace['gallery'][0]['images']->toArray());//$gallery['images'][0]['imagePath']
        //dd($touristicPlace->toArray());      */  

        $viewData = $this->returnToDetailPlaceView($id);

        //dd($viewData['place']->toArray());

        return view('admin.places.detailPlace')
        ->with('place', $viewData['place'])
        ->with('tags', $viewData['tags'])
        ->with('provinces', $viewData['provinces'])
        ->with('categories', $viewData['categories']);

    }

    public function generateQr($id){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://tourism-service.herokuapp.com/processQr/', [
            'form_params' => [
                'id' => $id
            ]
        ]);
        $body = (string) $response->getBody();
        $content = json_decode($body);
        //dd(json_decode($content)->base64);

        $touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        //$touristicPlace['qrCode'] = base64_encode(QrCode::format('png')->size(100)->generate(json_encode($qrObj)));
        $touristicPlace['qrCode'] = $content->base64;
        $touristicPlace->save();
        
        flash('El QR se genero correctamente!')->success();
        return redirect()->route('front.placeDetail', ['id' => $id]);
    }

    public function returnToDetailPlaceView($id){
        $busData = null;
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
        $touristicPlace->product;
        
        $touristicPlace->gallery->each(function($galleryData){
            $galleryData->images;            
        });

        $touristicPlace->commentary->each(function($commentaryData){
            $commentaryData->user;            
        });

        $tags = TagObj::orderBy('tagName', 'desc')->get();
        $provinces = ProvinceObj::orderBy('provinceName', 'desc')->get();
        //dd($provinces[0]['provinceName']);

        //dd($touristicPlace->toArray()['tag']);
        //dd($id);
        //dd($touristicPlace->toArray());
        //dd($touristicPlace['gallery'][0]['images']->toArray());//$gallery['images'][0]['imagePath']
        //dd($touristicPlace->toArray());        

        $busData['place'] = $touristicPlace;
        $busData['tags'] = $tags;
        $busData['provinces'] = $provinces;
        $busData['categories'] = $categories;

        /*return view('admin.places.detailPlace')
        ->with('place', $touristicPlace)
        ->with('tags', $tags)
        ->with('provinces', $provinces)
        ->with('categories', $categories)
        ->with('message', $message);*/

        return $busData;

    }


    public function destroyPlace($id)
    {
        $touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        $touristicPlace->delete();
        //dd($touristicPlace);
        flash('Se eliminó la información correctamente!')->warning();
        return redirect()->route('front.places');

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

        $logGallery = GalleryObj::find($newGallery->galleryId);
        $logGallery->images;
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Registro', 'Galería', '', json_encode($logGallery));

        flash('Se creo la galería ' . $data['galleryName'] . ' !')->success();
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
        flash('Se eliminó correctamente la galería!')->warning();
        return redirect()->route('front.placeDetail', ['id' => $touristicPlaceId]);
    }

    public function editGallery($id)
    {
        //dd(phpinfo());
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

        $this->sendInvitationEmail($data);

        $newData['touristicPlaceId'] = $data['touristicPlaceId'];
        $newData['provinceId'] = $provinceData->provinceId;
        $newData['history'] = $data['inputPlacehistory'];
        $newData['description'] = $data['inputPlaceDescription'];
        $newData['placeName'] = $data['placeName'];
        $newData['streets'] = $data['streets'];
        $newData['latitude'] = $data['inputPlaceLatitude'];
        $newData['longitude'] = $data['inputPlaceLongitude'];
        $newData['placeStatusId'] = isset($data['statusRadio']) ? $data['statusRadio'] : 4;
        $newData['type'] = $data['inputPlaceType'];

        if($newData['type'] == 'event'){
            $newData['startDate'] = $data['startDate'];
            $newData['endDate'] = $data['endDate'];
            if($data['startDate'] > $data['endDate']) {
                flash('El valor de las fechas no tienen el formato correcto!')->warning();
                return redirect()->route('front.placeDetail', ['id' => $data['touristicPlaceId']]);
            }
        }else{
            $newData['startDate'] = null;
            $newData['endDate'] = null;
        }
        //dd($newData);

        $oldData = TouristicObj::find($data['touristicPlaceId']);
        $touristicPlace = TouristicObj::find($data['touristicPlaceId']); 

        if($file=$request->file('image')){
            //dd('se actualizara la imagen ');
            if (\Storage::exists(public_path(). '/images/places/' . $touristicPlace['touristicPlaceId'] . '/' .$touristicPlace['mainImage'])) \Storage::delete(public_path(). '/images/places/' . $touristicPlace['touristicPlaceId'] . '/' .$touristicPlace['mainImage']);
            $name = 'mainImage' . '.' . $file->getClientOriginalExtension();
            $newData['mainImage'] = $name;
            $path = public_path() . '/images/places/' . $touristicPlace['touristicPlaceId'] .'/';
            $file->move($path, $name);
        }

        if(isset($data['agentEmail'])){

            $userData = UserTableObj::where('email', '=', $data['agentEmail'])->first();
            //si existe el usuario con el correo que se envio y el estado esta en enviar
            if(isset($userData) && $userData['typeId'] == 3){
                $newData['userId'] = $userData['userId'];
            }
        }

        $touristicPlace->fill($newData);
        $touristicPlace->save();
        $updatedPlace = $touristicPlace; 
        $touristicPlace->tag()->sync($data['inputPlaceTags']);

        if(isset($data['inputPlaceCategories'])) {
            $touristicPlace->category()->sync($data['inputPlaceCategories']);    
        }

        
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Edición', 'Lugar Turistico', json_encode($oldData), json_encode($updatedPlace));
        //dd($touristicPlace->toArray());
        flash('El registro se actualizó con éxito!')->success();
        return redirect()->route('front.placeDetail', ['id' => $data['touristicPlaceId']]);
        /*$viewData = $this->returnToDetailPlaceView($data['touristicPlaceId'], true);
        //dd($data);

        return view('admin.places.detailPlace')
        ->with('place', $viewData['place'])
        ->with('tags', $viewData['tags'])
        ->with('provinces', $viewData['provinces'])
        ->with('categories', $viewData['categories'])
        ->with('message', $viewData['message']);*/
    }

    public function sendInvitationEmail($data){

        if(isset($data['agentEmail'])){

            $userData = UserTableObj::where('email', '=', $data['agentEmail'])->first();
            
            //si existe el usuario con el correo que se envio y el estado esta en enviar
            if(isset($userData) && $data['sendRadio'] == 'sendOk' && $userData['typeId'] == 3){
                //dd('Se enviara un correo');
                Mail::to($data['agentEmail'])->send(new InvitationEmail($data['agentEmail'], '********'));
            }else if(!isset($userData)){
                //dd('send mail and create account');

                $tempPassword = $this->generatePassword(8);

                $newData['statusId'] = '2';
                $newData['typeId'] = '3';
                $newData['name'] = 'Agent';
                $newData['lastName'] = 'Agent';
                $newData['email'] = $data['agentEmail'];
                $newData['password'] = bcrypt($tempPassword);
                $newUser = new UserTableObj($newData);
                $newUser->save();

                Mail::to($data['agentEmail'])->send(new InvitationEmail($data['agentEmail'], $tempPassword));
            }

            //Mail::to($userData['save']['email'])->send(new welcome($userData['save']['verificationCode']));
        }

    }

    public function generatePassword($l) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $l;$i++) $key .= $pattern[mt_rand(0,$max)];
        return $key;
    }

    public function destroyGalleryImage($id)
    {

        $logImage = ImageObj::where('imageId', '=', $id)->first();
        $logImage->gallery->TouristicPlace;
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Eliminar', 'Galería - Imagen', json_encode($logImage), '');
        
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
        return redirect()->route('admin.gallery.edit', ['id' => $image['galleryId']]);
    }

    public function createImage(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $oldGallery = GalleryObj::where('galleryId', '=', $data['galleryId'])->first();
        $oldGallery->images;
        $images = '';
        $gallery = GalleryObj::where('galleryId', '=', $data['galleryId'])->first();

        $newData['galleryName'] = $data['galleryName'];

        $gallery->fill($newData);
        $gallery->save();

        if($files=$request->file('images')){
            //dd($files);
            $images = '- Imagenes';
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

        $newGallery = $gallery;
        $newGallery->images;
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Edición', 'Galería' . $images, json_encode($oldGallery), json_encode($newGallery));

        flash('La galería se actualizó correctamente!')->success();
        return redirect()->route('admin.gallery.edit', ['id' => $data['galleryId']]);
    }

    public function tags(){
        $tags = TagObj::orderBy('tagName', 'desc')->get();

        //dd($tags->toArray());
        return view('admin.tags.tags')
        ->with('tags', $tags);

    }

    public function destroyTag($id){
        //dd($id);
        $tag = TagObj::where('tagId', '=', $id)->first();
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Eliminar', 'Tag', json_encode($tag), '');

        $tag->delete();
        //dd($TagObj);
        flash('Se eliminó el tag correctamente!')->warning();
        return redirect()->route('front.tags');

    }

    public function tagDetail($id){
        
        $tag = TagObj::where('tagId', '=', $id)->first();
        //dd($tag->toArray());
        return view('admin.tags.detail.detailtag')
        ->with('tag', $tag);

    }

    public function saveUpdatedTag(Request $request){
        //dd($request->all());
        $data = $request->all();

        $oldTag = TagObj::where('tagId', '=', $data['tagId'])->first();
        $tag = TagObj::where('tagId', '=', $data['tagId'])->first();
        $createdTag = TagObj::where('tagName', '=', $data['tagName'])->first();

        if(isset($createdTag) && $createdTag['tagId'] != $tag['tagId']){
            flash('El nombre ' . $data['tagName'] .' ya esta en uso!')->error();
            return redirect()->route('front.tagDetail', ['id' => $tag['tagId']]);
        }


        if($file=$request->file('image')){
            if (\File::exists(public_path(). '/images/tags/' . $tag['tagFile'])) \File::delete(public_path(). '/images/tags/' . $tag['tagFile']);
            $name = $data['tagName'] . '.' . $file->getClientOriginalExtension();
            $newData['tagFile'] = $name;
            $path = public_path() . '/images/tags/';
            $file->move($path, $name);
        }

        $newData['tagName'] = $data['tagName'];

        $tag->fill($newData);
        $tag->save();

        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Edición', 'Tag', json_encode($oldTag), json_encode($tag));

        flash('El tag ' . $newData['tagName'] .' se edito correctamente!')->success();
        return redirect()->route('front.tagDetail', ['id' => $tag['tagId']]);
    }

    public function createTag(Request $request){
        //dd($request->all());
        $data = $request->all();
        $newTag['tagName'] = $data['tagName'];

        $createdTag = TagObj::where('tagName', '=', $data['tagName'])->first();

        if(isset($createdTag)){
            flash('El nombre ' . $data['tagName'] .' ya esta en uso!')->error();
            return redirect()->route('front.tags');
        }

        if($file=$request->file('image')){
            $name = $data['tagName'] . '.' . $file->getClientOriginalExtension();
            $newTag['tagFile'] = $name;
            $path = public_path() . '/images/tags/';
            $file->move($path, $name);
        }

        $storedTag = new TagObj($newTag);
        $storedTag->save();
        
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Registro', 'Tag', '', json_encode($storedTag));

        flash('Se creó el tag '. $storedTag['tagName'] . ' correctamente!')->success();
        return redirect()->route('front.tags');

    }

    public function provinces(){
        $provinces = ProvinceObj::orderBy('provinceName', 'asc')->get();

        //dd($tags->toArray());
        return view('admin.provinces.provinces')
        ->with('provinces', $provinces);
    }

    public function destroyProvince($id){
        //dd($id);
        $province = ProvinceObj::where('provinceId', '=', $id)->first();
        $province->touristicPlace;        
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Eliminar', 'Provincia', json_encode($province), '');
        $province->delete();
        //dd($TagObj);
        flash('Se eliminó la provincia correctamente!')->warning();
        return redirect()->route('front.provinces');

    }

    public function createProvince(Request $request){
        //dd($request->all());
        $data = $request->all();

        $provinceCreated = ProvinceObj::where('provinceName', '=', $data['provinceName'])->first();

        if(empty($provinceCreated)){
            $newProvince['provinceName'] = $data['provinceName'];
            $newProvince['latitude'] = $data['inputPlaceLatitude'];
            $newProvince['longitude'] = $data['inputPlaceLongitude'];
            $storedProvince = new ProvinceObj($newProvince);
            $storedProvince->save();
            
            flash('La provincia '. $newProvince['provinceName'] . ' se creó correctamente!')->success();
        }else{
            flash('La provincia '. $data['provinceName'] . ' ya esta en uso!')->error();
        }

        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Registro', 'Provincia', '', json_encode($storedProvince));
        
        return redirect()->route('front.provinces');

    }

    public function provinceDetail($id){
        
        $province = ProvinceObj::where('provinceId', '=', $id)->first();
        //dd($tag->toArray());
        return view('admin.provinces.detailProvince')
        ->with('province', $province);

    }

    public function saveUpdatedProvince(Request $request){
        //dd($request->all());
        $data = $request->all();

        $oldProvince = ProvinceObj::where('provinceId', '=', $data['provinceId'])->first();
        $province = ProvinceObj::where('provinceId', '=', $data['provinceId'])->first();
        $provinceCreated = ProvinceObj::where('provinceName', '=', $data['provinceName'])->first();

        if(isset($provinceCreated) && $provinceCreated['provinceId'] != $province['provinceId']){
            flash('La provincia '. $data['provinceName'] . ' ya esta en uso!')->error();
            return redirect()->route('front.provinceDetail', ['id' => $data['provinceId']]);
        }else{
            flash('La provincia '. $data['provinceName'] . ' se actualizó correctamente!')->success();
        }

        $newData['provinceName'] = $data['provinceName'];
        $newData['latitude'] = $data['inputPlaceLatitude'];
        $newData['longitude'] = $data['inputPlaceLongitude'];

        $province->fill($newData);
        $province->save();

        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Edición', 'Provincia', json_encode($oldProvince), json_encode($province));

        return redirect()->route('front.provinceDetail', ['id' => $province['provinceId']]);
    }

    public function categories(){
        $categories = CategoryObj::orderBy('categoryName', 'asc')->get();
        $tags = TagObj::orderBy('tagName', 'desc')->get();

        $categories->each(function($category){
            $category->Tag['tagName'];                            
        });

        //dd($categories->toArray());
        return view('admin.categories.categories')
        ->with('categories', $categories)
        ->with('tags', $tags);
    }

    public function createCategory(Request $request){
        //dd($request->all());
        $data = $request->all();

        $categoryCreated = CategoryObj::where('categoryName', '=', $data['categoryName'])->first();

        if(empty($categoryCreated)){

            //$stringName = utf8_encode($data['categoryName']);

            $newCategory['categoryName'] = $this->formatString($data['categoryName']);
            $newCategory['tagId'] = $data['inputPlaceTag'];
            $storedCategory = new CategoryObj($newCategory);
            $storedCategory->save();
            flash('La categoría '. $newCategory['categoryName'] . ' se creó correctamente!')->success();

        }else{
            flash('La categoría '. $data['categoryName'] . ' ya esta en uso!')->error();
        }

        $user = \Auth::user();
        $storedCategory->Tag;
        $this->saveLogAction($user['userId'], 'Registro', 'Categoría', '', json_encode($storedCategory));
        
        return redirect()->route('front.categories');

    }

    public function formatString($string){

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );
    
        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string );
    
        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string );
    
        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string );
    
        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string );
    
        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $string
        );
    
        return $string;
    }

    public function categoryDetail($id){
        
        $category = CategoryObj::where('categoryId', '=', $id)->first();
        $tags = TagObj::orderBy('tagName', 'desc')->paginate(10);
        //dd($tag->toArray());

        return view('admin.categories.detailCategory')
        ->with('category', $category)
        ->with('tags', $tags);
    }

    public function storeUpdatedCategory(Request $request){
        //dd($request->all());
        $data = $request->all();

        $oldCategory = CategoryObj::where('categoryId', '=', $data['categoryId'])->first();
        $oldCategory->Tag;
        $category = CategoryObj::where('categoryId', '=', $data['categoryId'])->first();
        $categoryCreated = CategoryObj::where('categoryName', '=', $data['categoryName'])->first();

        if(isset($categoryCreated) && $categoryCreated['categoryId'] != $category['categoryId']){
            flash('La categoría '. $data['categoryName'] . ' ya esta en uso!')->error();
            return redirect()->route('front.categoryDetail', ['id' => $category['categoryId']]);
        }else{
            flash('La categoría '. $data['categoryName'] . ' se actualizó correctamente!')->success();
        }

        $newData['categoryName'] = $data['categoryName'];
        $newData['tagId'] = $data['inputPlaceTag'];

        $category->fill($newData);
        $category->save();
        
        $category->Tag;
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Edición', 'Categoría', json_encode($oldCategory), json_encode($category));

        return redirect()->route('front.categoryDetail', ['id' => $category['categoryId']]);
    }

    public function destroyCategory($id){
        //dd($id);
        $category = CategoryObj::where('categoryId', '=', $id)->first();
        $category->Tag;
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Eliminar', 'Categoría', json_encode($category), '');
        $category->delete();
        //dd($TagObj);
        flash('Se eliminó la categoría correctamente!')->warning();
        return redirect()->route('front.categories');

    }

    public function destroyCommentary($id){
        //dd($id);
        $logCommentary = CommentaryObj::where('commentaryId', '=', $id)->first();
        $logCommentary->user;
        $logCommentary->touristicPlace;
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Eliminar', 'Comentario', json_encode($logCommentary), '');

        $commentary = CommentaryObj::where('commentaryId', '=', $id)->first();
        $touristicPlaceId = $commentary['touristicPlaceId'];
        $commentary->delete();
        //dd($TagObj);

        flash('Comentario eliminado!')->warning();
        return redirect()->route('front.placeDetail', ['id' => $touristicPlaceId]);

    }

    public function reports(){
        $touristicPlaces = TouristicObj::orderBy('touristicPlaceId', 'asc')->get();

        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
            $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
            $touristicPlace['countCommentary'] = round($touristicPlace->commentary->count());
            unset($touristicPlace['province']);
            unset($touristicPlace['status']);
            unset($touristicPlace['commentary']);

        });

        //dd($categories->toArray());
        return view('admin.reports.reports')
        ->with('touristicPlaces', $touristicPlaces->sortByDesc("rateAvg"));
    }

    public function generateReport(){

        $touristicPlaces = TouristicObj::orderBy('touristicPlaceId', 'asc')->get();

        $touristicPlaces->each(function($touristicPlace){
            $touristicPlace['provinceName'] = $touristicPlace->province['provinceName'];
            $touristicPlace['statusName'] = $touristicPlace->status['statusName'];
            $touristicPlace['rateAvg'] = round($touristicPlace->rate->avg('puntuacion'));
            $touristicPlace['countCommentary'] = round($touristicPlace->commentary->count());
            unset($touristicPlace['province']);
            unset($touristicPlace['status']);
            unset($touristicPlace['commentary']);

        });

        //$touristicPlaces =  $touristicPlaces->sortBy("rateAvg");

        $pdf = PDF::loadView('admin.reports.pdf.template', compact('touristicPlaces'));


        return $pdf->stream('reporte-turismo.pdf');
    }

    public function editProduct($id)
    {
        //dd(phpinfo());
        $product = ProductObj::where('productId', '=', $id)->first();
        //dd($product->toArray());

        return view('admin.places.editProduct')
        ->with('product', $product);
    }

    public function storeUpdatedProduct(Request $request){

        $data = $request->all();
        //dd($data);

        $newData['productId'] = $data['productId'];
        $newData['productName'] = $data['productName'];
        $newData['productDescription'] = $data['productDescription'];

        //dd($newData);

        $oldProduct = ProductObj::find($data['productId']);
        $oldProduct->touristicPlace;
        $product = ProductObj::find($data['productId']); 
        $newProduct = $product;
        $newProduct->touristicPlace;

        if($file=$request->file('image')){
            if (\File::exists(public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon'])) \File::delete(public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon']);
            //dd(\Storage::exists(public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon']));
            //dd(public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon']);
            $name = $product['productId'] . '.' . $file->getClientOriginalExtension();
            $newData['productIcon'] = $name;
            $path = public_path() . '/images/places/' . $product['touristicPlaceId'] . '/products/';
            $file->move($path, $name);
        }

        $product->fill($newData);
        $product->save();
        
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Edición', 'Producto', json_encode($oldProduct), json_encode($newProduct));
        
        //dd($touristicPlace->toArray());
        flash('El registro se actualizó con éxito!')->success();
        return redirect()->route('admin.product.edit', ['id' => $data['productId']]);

    }

    public function createProduct(Request $request)
    {
        $data=$request->all();
        $touristicPlace = json_decode($data['inputPlace']);

        //dd($data);//galerries/1/
        $newData['touristicPlaceId'] = $touristicPlace->touristicPlaceId;
        $newData['productName'] = $data['productName'];
        $newData['productDescription'] = $data['productDescription'];
        $newData['productIcon'] = 'temp';
        $newProduct = new ProductObj($newData);
        $newProduct->save();


        if($file=$request->file('image')){
            //dd($files);
            $name = $newProduct['productId'] . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/places/' . $touristicPlace->touristicPlaceId . '/products/';
            $file->move($path,$name);
            
            $newData['productIcon'] = $name;
            $newProduct1 = ProductObj::find($newProduct->productId); 
            $newProduct1->fill($newData);
            $newProduct1->save();
        }

        $newProduct->touristicPlace;
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Registro', 'Producto', '', json_encode($newProduct));

        flash('Se creo El producto ' . $newProduct['productName'] . ' !')->success();
        return redirect()->route('front.placeDetail', ['id' => $touristicPlace->touristicPlaceId]);
    }

    public function destroyProduct($id)
    {
        $logProduct = ProductObj::where('productId', '=', $id)->first();
        $logProduct->touristicPlace;
        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Eliminar', 'Producto', json_encode($logProduct), '');
        //dd($id);
        $product = ProductObj::where('productId', '=', $id)->first();
        $touristicPlaceId = $product['touristicPlaceId'];
        //dd(\File::exists(public_path(). '/images/places/10/products/3.jpg'));
        //dd(\Storage::delete(public_path(). '/images/places/10/products/3.jpg'));
        if (\File::exists(public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon'])) \File::delete(public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon']);
        $product->delete();
        flash('Se eliminó correctamente el producto!')->warning();
        return redirect()->route('front.placeDetail', ['id' => $touristicPlaceId]);
    }

    //Actions module
    public function actions()
    {
        $userList = UserTableObj::where('statusId', '=', 4)
                                ->orderBy('created_at', 'desc')
                                ->get();
        $actionList = ActionObj::orderBy('created_at', 'desc')->get();
        $actionList->each(function($action){
            $action->user->userType;
        });
        //dd($actionList->toArray());
        $userList->each(function($userList){
            $userList->touristicPlace->each(function($touristicPlace){
                $touristicPlace->status;
            });
        });
        //dd($userList->toArray());

        $tourismList = TouristicObj::where('placeStatusId', '=', 4)
                                ->orderBy('created_at', 'desc')
                                ->get();
        $tourismList->each(function($tourismList){
            $tourismList->user;
            $tourismList->status;
        });                                

        //dd($tourismList->toArray());
        return view('admin.actions.actions')
        ->with('users', $userList)
        ->with('places', $tourismList)
        ->with('actions', $actionList);

    }

    public function actionApprove($id)
    {
        //TODO: send email approve

        $selectedUser = UserTableObj::find($id);
        $selectedUser->touristicPlace;

        //dd($selectedUser->toArray());
        $updatedData['statusId'] = 2;
        $tempPassword = $this->generatePassword(8);
        $updatedData['password'] = bcrypt($tempPassword);
     
        //dd($tempPassword);
        $selectedUser->fill($updatedData);
        $selectedUser->save();

        $selectedUser['touristicPlace']->each(function($touristicPlace){
            $updatedPlace['placeStatusId'] = 2;
            $tempData = TouristicObj::find($touristicPlace['touristicPlaceId']);
            $tempData->fill($updatedPlace);
            $tempData->save();
        });

        //Send confirmation email
        Mail::to($selectedUser['email'])->send(new ConfirmationEmail('approve', $selectedUser['email'], $tempPassword));
        //dd($selectedUser->toArray());

        $userList = UserTableObj::where('statusId', '=', 4)
                                ->orderBy('created_at', 'desc')
                                ->get();
        $userList->each(function($userList){
            $userList->touristicPlace->each(function($touristicPlace){
                $touristicPlace->status;
            });
        });

        $actionList = ActionObj::orderBy('created_at', 'desc')->get();
        $actionList->each(function($action){
            $action->user->userType;
        });

        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Aprobacion', 'Usuario - Turismo', '', json_encode($selectedUser));

        flash('El registro y los datos asociados fueron aprobados!')->success();
        return view('admin.actions.actions')
        ->with('users', $userList)
        ->with('actions', $actionList);

    }

    public function actionReject($id)
    {
        $selectedUser = UserTableObj::find($id);
        $selectedUser->touristicPlace;        

        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Aprobacion', 'Usuario - Turismo', json_encode($selectedUser), '');

        $selectedUser['touristicPlace']->each(function($touristicPlace){
            $touristicPlace->delete();
        });

        Mail::to($selectedUser['email'])->send(new ConfirmationEmail('reject', $selectedUser['email'], null));
        $selectedUser->delete();

        $userList = UserTableObj::where('statusId', '=', 4)
                                ->orderBy('created_at', 'desc')
                                ->get();

        $userList->each(function($userList){
            $userList->touristicPlace->each(function($touristicPlace){
                $touristicPlace->status;
            });
        });

        $user = \Auth::user();
        $this->saveLogAction($user['userId'], 'Aprobacion', 'Usuario - Turismo', json_encode($selectedUser), '');

        flash('Se elimino el registro y los datos asociados!')->warning();
        return view('admin.actions.actions')
        ->with('users', $userList);

    }

    public function actionDestroyPlace($id)
    {
        $touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        $touristicPlace->delete();
        //dd($touristicPlace);
        flash('Se eliminó la información correctamente!')->warning();
        return redirect()->route('front.actions');

    }

    public function saveLogAction($userId , $actionName, $table = '', $old = null, $new = null) {
        $newData['userId'] = $userId;
        $newData['actionName'] = $actionName;
        $newData['table'] = $table;
        $newData['oldData'] = $old;
        $newData['newData'] = $new;
        $newData['ip'] = $this->getIp();
        $newAction = new ActionObj($newData);
        $newAction->save();
    }

    public function actionDetail($id){
        $actionList = ActionObj::where('actionId', '=', $id)->first();
        
        $actionList->each(function($action){
            $action->user->userType;
        });
        //dd($action->toArray());
        return view('admin.actions.detailAction')
        ->with('action', $actionList);
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    public function actionPlaceApprove($id) {
        $placeData = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        $placeData['placeStatusId'] = 2;
        $placeData->save();
        flash('El registro se aprobó correctamente!')->success();
        return redirect()->route('front.actions');
    }
    
}
