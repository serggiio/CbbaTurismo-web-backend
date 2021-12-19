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

use Illuminate\Support\Facades\Mail;
use App\Mail\AgentResetPassword;

use laracasts\flash\flash;

class AgentController extends Controller
{
    
    public function index()
    {
        $user = \Auth::user();
        $touristicPlaces = TouristicObj::where([
            ['userId', '=', $user['userId']],
            ['placeStatusId', '<>', 4]
        ])->get();
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
        $oldUser = UserTableObj::where('userId', '=', $data['inputId'])->first();
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

        $this->saveLogAction('Edición', 'Usuario agente', json_encode($oldUser), json_encode($user));

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
        $touristicPlace->product;
        
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
        //dd($data);

        $newData['touristicPlaceId'] = $data['touristicPlaceId'];
        $newData['provinceId'] = $provinceData->provinceId;
        $newData['history'] = $data['inputPlacehistory'];
        $newData['description'] = $data['inputPlaceDescription'];
        $newData['placeName'] = $data['placeName'];
        $newData['streets'] = $data['streets'];
        $newData['latitude'] = $data['inputPlaceLatitude'];
        $newData['longitude'] = $data['inputPlaceLongitude'];
        $newData['placeStatusId'] = $data['statusRadio'];
        $newData['type'] = $data['inputPlaceType'];

        if($newData['type'] == 'event'){
            $newData['startDate'] = $data['startDate'];
            $newData['endDate'] = $data['endDate'];
            if($data['startDate'] > $data['endDate']) {
                flash('El valor de las fechas no tienen el formato correcto!')->warning();
                return redirect()->route('frontAgent.placeDetail', ['id' => $data['touristicPlaceId']]);
            }
        }else{
            $newData['startDate'] = null;
            $newData['endDate'] = null;
        }
        //dd($newData);

        $oldTouristicPlace = TouristicObj::find($data['touristicPlaceId']); 
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

        
        $this->saveLogAction('Edición', 'Usuario agente', json_encode($oldTouristicPlace), json_encode($touristicPlace));

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

        $newGallery1->images;

        $this->saveLogAction('Registro', 'Agente - galería', '', json_encode($newGallery1));

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
        $oldGallery = GalleryObj::where('galleryId', '=', $data['galleryId'])->first();
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

        $oldGallery->images;
        $gallery->images;

        $this->saveLogAction('Edición', 'Agente - galería', json_encode($oldGallery), json_encode($gallery));

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
            $image->gallery;
            $this->saveLogAction('Eliminar', 'Agente - galería - Imagen', json_encode($image), '');
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
        $this->saveLogAction('Eliminar', 'Agente - galería', json_encode($gallery), '');
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
        $this->saveLogAction('Eliminar', 'Agente - comentario', json_encode($commentary), '');
        $commentary->delete();
        //dd($TagObj);
        flash('Comentario eliminado!')->warning();
        return redirect()->route('frontAgent.placeDetail', ['id' => $touristicPlaceId]);

    }

    public function editProduct($id)
    {
        //dd(phpinfo());
        $product = ProductObj::where('productId', '=', $id)->first();
        $user = \Auth::user();
        //dd($product->toArray());

        return view('agent.agentEditProduct')
        ->with('user', $user)
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
        $product = ProductObj::find($data['productId']); 

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

        $this->saveLogAction('Edición', 'Agente - producto', json_encode($oldProduct), json_encode($product));
        //dd($touristicPlace->toArray());
        flash('El registro se actualizó con éxito!')->success();
        return redirect()->route('agent.product.edit', ['id' => $data['productId']]);

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

        $this->saveLogAction('Edición', 'Agente - producto', '', json_encode($newProduct1));
        flash('Se creo El producto ' . $newProduct['productName'] . ' !')->success();
        return redirect()->route('frontAgent.placeDetail', ['id' => $touristicPlace->touristicPlaceId]);
    }

    public function destroyProduct($id)
    {
        //dd($id);
        $product = ProductObj::where('productId', '=', $id)->first();
        $touristicPlaceId = $product['touristicPlaceId'];
        //dd(\File::exists(public_path(). '/images/places/10/products/3.jpg'));
        //dd(\Storage::delete(public_path(). '/images/places/10/products/3.jpg'));
        if (\File::exists(public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon'])) \File::delete(public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon']);
        $this->saveLogAction('Eliminar', 'Agente - producto', '', json_encode($product));
        $product->delete();
        flash('Se eliminó correctamente el producto!')->warning();
        return redirect()->route('frontAgent.placeDetail', ['id' => $touristicPlaceId]);
    }

    public function agentContact(Request $request)
    {
        $data = $request->all();

        //dd($data);
        if(!$data) return view('template.resultContact');
        $user = UserTableObj::where('email', '=', $data['email'])->first();
        $dataInfo;
        if($user){
            if($user['typeId'] == 1){
                //user admin, throw error
                //dd('Error: El correo proporcionado ya pertenece a un usuario con otro tipo de cuenta');
                $dataInfo['type'] = 'Error';
                $dataInfo['user'] = $user;;
            }else {
                //user agent or turist, create or update account //agente typeId = 3
                //dd('El usuario no es administrador');
                $user['typeId'] = 3;
                $user->save();

                $dataInfo['type'] = 'Success';
                $dataInfo['action'] = 'update';
                $dataInfo['user'] = $user->toArray();
            }
        }else {
            //dd('No existe cuenta con ese correo, creando una');
            //agent status review = 4, typeId = 3     
            $newAgent['statusId'] = 4;
            $newAgent['typeId'] = 3;
            $newAgent['name'] = '';
            $newAgent['lastName'] = '';
            $newAgent['phoneNumber'] = $data['phoneNumber'];
            $newAgent['email'] = $data['email'];
            $newAgent['password'] = '';
            $agent = new UserTableObj($newAgent);
            $agent->save();

            $dataInfo['type'] = 'Success';
            $dataInfo['action'] = 'create';
            $dataInfo['user'] = $agent->toArray();

        }

        if($data['placeName'] && $dataInfo['type'] != 'Error'){
            //dd('crear lugar turistico');//status = 4 review // defailt province = 1
            $newTouristicObj['provinceId'] = 1;
            $newTouristicObj['userId'] = $dataInfo['user']['userId'];
            $newTouristicObj['placeStatusId'] = 4;
            $newTouristicObj['placeName'] = $data['placeName'];
            $newTouristicObj['mainImage'] = '';
            $newTouristicObj['latitude'] = 0;
            $newTouristicObj['longitude'] = 0;
            $newTouristicObj['type'] = 'place'; //TODO select on contact form place/event
            $place = new TouristicObj($newTouristicObj);
            $place->save();
            $place->tag()->sync($data['inputPlaceTags']);

            $dataInfo['type'] = 'Success';
            $dataInfo['actionPlace'] = 'create';
            $dataInfo['touristicPlace'] = $place->toArray();

        }
        //dd($dataInfo);
        return view('template.resultContact')
        ->with('data', $dataInfo);

    }

    public function saveLogAction($actionName, $table = '', $old = null, $new = null) {
        $user = \Auth::user();
        $newData['userId'] = $user['userId'];
        $newData['actionName'] = $actionName;
        $newData['table'] = $table;
        $newData['oldData'] = $old;
        $newData['newData'] = $new;
        $newData['ip'] = $this->getIp();
        $newAction = new ActionObj($newData);
        $newAction->save();
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
        return request()->ip();
    }

    public function request(){
        $user = \Auth::user();
        $touristicPlaces = TouristicObj::where([
            ['placeStatusId', '=', 4],
            ['userId', '=', $user['userId']]
        ])->get();
        $tags = TagObj::orderBy('tagName', 'desc')->get();
        //dd($touristicPlaces->toArray());
        return view('agent.agentRequest')
        ->with('places', $touristicPlaces)
        ->with('tags', $tags)
        ->with('user', $user);
    }

    public function agentRequest(Request $request){
        $data = $request->all();
        $user = \Auth::user();

        $newTouristicObj['provinceId'] = 1;
        $newTouristicObj['userId'] = $user['userId'];
        $newTouristicObj['placeStatusId'] = 4;
        $newTouristicObj['placeName'] = $data['placeName'];
        $newTouristicObj['mainImage'] = '';
        $newTouristicObj['latitude'] = 0;
        $newTouristicObj['longitude'] = 0;
        $newTouristicObj['type'] = 'place'; //TODO select on contact form place/event
        $place = new TouristicObj($newTouristicObj);
        $place->save();
        $place->tag()->sync($data['inputPlaceTags']);
        $this->saveLogAction('Registro', 'Turismo - solicitud', '', json_encode($place));
        
        flash('La solicitud '. $place['palceName'] . ' se envio correctamente!')->success();
        return redirect()->route('frontAgent.request');
    }

    public function destroyRequest($id){
        //dd($id);
        $touristicPlace = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        $touristicPlace->delete();
        flash('La solicitud se elimino correctamente!')->warning();
        return redirect()->route('frontAgent.request');
    }

    public function generateCode($l) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $l;$i++) $key .= $pattern[mt_rand(0,$max)];
        return $key;
    }

    public function resetPassword(Request $request)
    {
        $data = $request->all();
        //dd($data);
        //dd($request->root());

        try {
            

            //$userData = UserTableObj::find($user['email']); 
            $currentPath = $request->root();
            //dd($currentPath);
            $userData = UserTableObj::where([
                ["email", "=", $data['email']]
            ])->get()->first();
            $responseObj = [
                'type' => 'OK_RESET'
            ];
            if(isset($userData)){
                $resetCode = $this->generateCode(6);
                $userData['remember_token'] = $resetCode;
                //dd($userData['email']);
                Mail::to($userData['email'])->send(new AgentResetPassword($resetCode, $currentPath, "setPassword"));
                $userData->save();
            }else {
                $responseObj['type'] = 'ERROR_RESET';
            }
            return view('template.resultContact')
            ->with('data', $responseObj);

        } catch (\Throwable $th) {
            $responseObj = [
                'type' => 'ERROR_RESET'
            ];
            return view('template.resultContact')
            ->with('data', $responseObj);
        }        
    }

    public function setPassword($code)
    {
        //dd($code);

        try {
            //dd($currentPath);
            $userData = UserTableObj::where([
                ["remember_token", "=", $code]
            ])->get()->first();
            $responseObj = [
                'type' => 'DONE_RESET'
            ];
            if(isset($userData)){
                $resetCode = $this->generateCode(10);
                $userData['remember_token'] = $resetCode;
                $userData->save();
                return redirect()->route('frontAgent.setResetPassword', ['code' => $resetCode]);
            }else {
                $responseObj['type'] = 'ERROR_PROCESS_RESET';
            }
            return view('template.resultContact')
            ->with('data', $responseObj);

        } catch (\Throwable $th) {
            $responseObj = [
                'type' => 'ERROR_RESET'
            ];
            return view('template.resultContact')
            ->with('data', $responseObj);
        }
        
    }

    public function setResetPassword($code)
    {

        try {
            //dd($currentPath);
            $userData = UserTableObj::where([
                ["remember_token", "=", $code]
            ])->get()->first();
            $responseObj = [
                'type' => 'DONE_RESET'
            ];
            if(isset($userData)){
                $resData['user'] = $userData;
                return view('template.setResetPassword')
                ->with('data', $resData);
            }else {
                $responseObj['type'] = 'ERROR_PROCESS_RESET';
            }
            return view('template.resultContact')
            ->with('data', $responseObj);

        } catch (\Throwable $th) {
            $responseObj = [
                'type' => 'ERROR_RESET'
            ];
            return view('template.resultContact')
            ->with('data', $responseObj);
        }
        
    }

    public function updateResetPassword(Request $request) {
        $data = $request->all();
        //dd($data);
        try {
            $userData = UserTableObj::where([
                ["email", "=", $data['email']],
                ["remember_token", "=", $data['token']]
            ])->get()->first();

            $responseObj = [
                'type' => 'DONE_RESET'
            ];
            if(isset($userData)){
                $resData['user'] = $userData;
                if($data['password'] != $data['repeatPassword']) {                                        
                    $resData['message'] = "Las contraseñas no coinciden.";
                    return redirect()->route('frontAgent.setResetPassword', ['code' => $data['token']]);
                }else{
                    $userData['password'] = bcrypt($data['password']);
                    $userData['remember_token'] = null;
                    $userData->save();
                    return view('template.resultContact')
                    ->with('data', $responseObj);
                }                
            }else {
                $responseObj['type'] = 'ERROR_PROCESS_RESET';
            }
            return view('template.resultContact')
            ->with('data', $responseObj);

        } catch (\Throwable $th) {
            $responseObj = [
                'type' => 'ERROR_RESET'
            ];
            return view('template.resultContact')
            ->with('data', $responseObj);
        }
    }
}
