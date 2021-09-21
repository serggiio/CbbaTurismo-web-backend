<?php

namespace App\Http\Controllers;

use App\TouristicPlace as TouristicObj;
use App\Images as ImagesObj;
use App\Tag as TagObj;
use App\Favorite as FavObj;
use App\Rate as RateObj;
use App\Gallery as GalleryObj;
use Illuminate\Http\Request;
use App\Category as CategoryObj;
use App\Commentary as CommentaryObj;
use App\Product as ProductObj;
use DB;

class TouristicPlaceController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *not created for API
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        return 'FUNCIONANDO PAPU';
    }


        /**
     * Display the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $data = $request->all();
        //$test1 = json_decode($data);
        try {
            $queryData = TouristicObj::where('placeStatusId', '=', 2)->get();
            //dd($queryData);
            //$tempData = TouristicObj::where('placeStatusId', '=', 1)->get();
            $tagList = array();
            array_push($tagList, 'tagName');
            //dd($tagList);
            $queryData->each(function($queryData){
                $queryData['provinceName'] = $queryData->province['provinceName'];                
                $queryData['rateAvg'] = round($queryData->rate->avg('puntuacion'));
                $queryData->tag;
                $queryData['tagList'] = array();
                foreach ($queryData['tag'] as $value) {
                    $tagList[] = $value['tagName'];
                }
                $queryData['tagList'] = $tagList;


                $queryData['gallery']->each(function($queryData){
                    //dd($queryData['galleryId']);
    
                    $queryData['images'] = ImagesObj::where('galleryId', '=', $queryData['galleryId'])->get();
                });

                //delete unnecesary data
                unset($queryData['tag']);
                unset($queryData['province']);
                unset($queryData['rate']);
            });


            return [
                'code' => 'OK',
                'get' => true,
                'data' => $queryData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
        
    }

    /**
     * get data By Id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTouristicPlaceById(Request $request)
    {
        $data = $request->all();
        //$test1 = json_decode($data);
        try {
            //$queryData = TouristicObj::where('touristicPlaceId', '=', $data['touristicPlace']['id'])->get()->first();
            $queryData = TouristicObj::where('touristicPlaceId', '=', $data['touristicPlace']['id'])->get()->first();
            //$tempData = TouristicObj::where('placeStatusId', '=', 1)->get();
            $tagList = array();
            //array_push($tagList, 'tagName');

            $queryData['provinceName'] = $queryData->province['provinceName'];                
            $queryData['rateAvg'] = round($queryData->rate->avg('puntuacion'));
            $queryData->tag;
            $queryData->gallery;
            $queryData->product;
            $queryData['tagList'] = array();
            foreach ($queryData['tag'] as $value) {
                $tagList[] = $value['tagName'];
            }

            $queryData['gallery']->each(function($queryData){
                //dd($queryData['galleryId']);

                $queryData['images'] = ImagesObj::where('galleryId', '=', $queryData['galleryId'])->get();
            });

            $queryData['tagList'] = $tagList;
            //delete unnecesary data
            unset($queryData['tag']);
            unset($queryData['province']);
            unset($queryData['rate']);


            return [
                'code' => 'OK',
                'get' => true,
                'data' => $queryData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }

     /**
     * get requestedImage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getImage(Request $request)
    {
        $path = public_path() . '/images/travel-12.jpg';
        //dd($path);
        return response()->file($path);
    }

    public function getMainImage($id)
    {
        $queryData = TouristicObj::where('touristicPlaceId', '=', $id)->first();
        //dd($queryData->toArray());
        $path = public_path() . '/images/places/'. $id .'/'. $queryData['mainImage'];
        //dd($path);
        return response()->file($path);
    }

    public function getImageById($id)
    {
        $queryData = ImagesObj::where('imageId', '=', $id)->first();
        $gallery = GalleryObj::where('galleryId', '=', $queryData['galleryId'])->first();
        //dd($queryData->toArray());
        $path = public_path() . '/'. $gallery['galleryPath'] .'/'. $queryData['imagePath'];
        //dd($path);
        return response()->file($path);
    }

    public function getTagImage($tagName)
    {   
        //dd($tagName);
        $tag = TagObj::where('tagName', '=', $tagName)->first();
        $path = public_path() . '/images/tags/' . $tag['tagFile'];
        //dd($path);
        return response()->file($path);
    }

    public function getTags()
    {   
        try {
            //$queryData = TouristicObj::where('touristicPlaceId', '=', $data['touristicPlace']['id'])->get()->first();
            $queryData = TagObj::all()->pluck('tagName');
            


            return [
                'code' => 'OK',
                'get' => true,
                'data' => $queryData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }

    public function getCategories()
    {   
        try {
            //$queryData = TouristicObj::where('touristicPlaceId', '=', $data['touristicPlace']['id'])->get()->first();
            $queryData = CategoryObj::all()->pluck('categoryName');
            


            return [
                'code' => 'OK',
                'get' => true,
                'data' => $queryData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }

    public function checkFavorite(Request $request)
    {   
        $data = $request->all();
        try {
            //$queryData = TouristicObj::where('touristicPlaceId', '=', $data['touristicPlace']['id'])->get()->first();
            $queryData = FavObj::where([
                ['touristicPlaceId', '=', $request['touristicPlaceId']],
                ['userId', '=', $request['userId']]
            ])->get()->first();
            


            return [
                'code' => 'OK',
                'get' => true,
                'data' => $queryData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }

    public function userRate(Request $request)
    {   
        $data = $request->all();
        try {
            //$queryData = TouristicObj::where('touristicPlaceId', '=', $data['touristicPlace']['id'])->get()->first();

            if(isset($data['puntuacion'])){
                //search or update in rate table
                $queryData = RateObj::where([
                    ['touristicPlaceId', '=', $data['touristicPlaceId']],
                    ['userId', '=', $data['userId']]
                ])->get()->first();

                if(isset($queryData)){
                    //update row in table                
                    $queryData->fill($data);
                    $queryData->save();
                    $result = $queryData;
                }else{
                    //create row in table
                    $newRate = new RateObj($data);
                    $newRate->save();
                    $result = $newRate;
                }

                //$result = 'OK';
            }else{
                //return rate obj
                $queryData = RateObj::where([
                    ['touristicPlaceId', '=', $data['touristicPlaceId']],
                    ['userId', '=', $data['userId']]
                ])->get()->first();

                $result = $queryData;
            }

            
            


            return [
                'code' => 'OK',
                'get' => true,
                'data' => $result
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }


    public function placesByFav(Request $request)
    {   
        $data = $request->all();
        try {
            //$queryData = TouristicObj::where('touristicPlaceId', '=', $data['touristicPlace']['id'])->get()->first();
                $queryData = FavObj::where([
                    ['userId', '=', $data['userId']]
                ])->get();
            
                $queryData->each(function($queryData){
                    
                    $queryData->touristicPlace;                

                    /*$queryData['provinceName'] = $queryData->province['provinceName'];                
                    $queryData['rateAvg'] = round($queryData->rate->avg('puntuacion'));
                    $queryData->tag;
                    $queryData['tagList'] = array();
                    foreach ($queryData['tag'] as $value) {
                        $tagList[] = $value['tagName'];
                    }
                    $queryData['tagList'] = $tagList;
                    //delete unnecesary data
                    unset($queryData['tag']);
                    unset($queryData['province']);
                    unset($queryData['rate']);*/
                });

            
            


            return [
                'code' => 'OK',
                'get' => true,
                'data' => $queryData
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }

    

    public function editFavorite(Request $request)
    {   
        $data = $request->all();
        try {
            //$queryData = TouristicObj::where('touristicPlaceId', '=', $data['touristicPlace']['id'])->get()->first();
            
            
            if($data['action'] == 'save'){

                $queryData = FavObj::where([
                        ['touristicPlaceId', '=', $request['data']['touristicPlaceId']],
                        ['userId', '=', $request['data']['userId']]
                    ])->get()->first();
                
                if($queryData){
                    $result = $queryData;
                }else{
                    $favorite = new FavObj($data['data']);
                    $favorite->save();
                    $result = $favorite;
                }

                
            }else if($data['action'] == 'delete'){
                $favorite = FavObj::where([
                    ['touristicPlaceId', '=', $request['data']['touristicPlaceId']],
                    ['userId', '=', $request['data']['userId']]
                ])->delete();
                //$favorite->delete();
                $result = $favorite;
            }

            


            return [
                'code' => 'OK',
                'get' => true,
                'data' => $result
            ];    
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }


    public function search(Request $request)
    {
        $data = $request->all();
        $finalList = array();
        $query = array(['type', '=', $data['touristicPlace']['type']], ['placeStatusId', '=', 2]);
        //array_push($query, ['placeName', 'LIKE', '%'.$data['touristicPlace']['name'].'%']);
        if(isset($data['touristicPlace']['name']) && !empty($data['touristicPlace']['name']) ){
            array_push($query, ['placeName', 'LIKE', '%'.$data['touristicPlace']['name'].'%']);
        } 


        try {
            
            $queryData = TouristicObj::where($query)
                /*->where([
                    ['touristicPlaceId', '=', 5]
                ])*/
                ->get();
            
            //$queryData1 = TouristicObj::get();
            $queryData->each(function($queryData){
                $queryData['provinceName'] = $queryData->province['provinceName'];                
                $queryData['rateAvg'] = round($queryData->rate->avg('puntuacion'));
                $queryData->tag;
                $queryData->category;
                $queryData['tagList'] = array();
                $queryData['categoryList'] = array();
                foreach ($queryData['tag'] as $value) {
                    $tagList[] = $value['tagName'];
                }
                //return $queryData['category'];
                //dd($queryData['category']);
                if(isset($queryData['category']) && !empty($queryData['category'][0])){
                    //dd($queryData);
                    foreach ($queryData['category'] as $value) {
                        $categoryList[] = $value['categoryName'];
                    }
                    $queryData['categoryList'] = $categoryList;
                }
                $queryData['tagList'] = $tagList;
                

                $queryData['gallery']->each(function($queryData){
                    //dd($queryData['galleryId']);
    
                    $queryData['images'] = ImagesObj::where('galleryId', '=', $queryData['galleryId'])->get();
                });

                //delete unnecesary data
                unset($queryData['tag']);
                unset($queryData['category']);
                unset($queryData['province']);
                unset($queryData['rate']);
                
            });
            foreach ($queryData as $value) {
                if(isset($data['touristicPlace']['province']) && !empty($data['touristicPlace']['province'])){
                    if($data['touristicPlace']['province'] == $value['provinceName']){
                        array_push($finalList, $value);
                    }
                }else if(isset($data['touristicPlace']['rate']) && is_numeric($data['touristicPlace']['rate'])){
                    if($data['touristicPlace']['rate'] == $value['rateAvg']){
                        array_push($finalList, $value);
                    }
                }else if(isset($data['touristicPlace']['tag']) && isset($data['touristicPlace']['tag'][0])){
                    foreach($data['touristicPlace']['tag'] as $paramTags){
                        foreach($value['tagList'] as $queryTags){
                            if($paramTags == $queryTags){
                                array_push($finalList, $value);
                                break;
                            }
                        }
                    }
                    
                }else if(isset($data['touristicPlace']['category']) && isset($data['touristicPlace']['category'][0])){
                    foreach($data['touristicPlace']['category'] as $paramCategory){
                        foreach($value['categoryList'] as $queryCategory){
                            if($paramCategory == $queryCategory){
                                array_push($finalList, $value);
                                break;
                            }
                        }
                    }
                    
                }
                else{
                    //array_push($finalList, $value['provinceName']); 
                    array_push($finalList, $value); 
                }
                
        
            }
            

            return [
                'code' => 'OK',
                'get' => true,
                'data' => $finalList
            ];    
        } catch (\Throwable $th) {
            dd($th);
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }

    public function searchByLocation(Request $request)
    {
        $data = $request->all();

        //id active status = 2
        $whereString = 'WHERE placeStatusId = 2 ';
        $joinCategory = ' INNER JOIN placecategory pc ON pc.touristicPlaceId = t.touristicPlaceId 
            INNER JOIN category c ON c.categoryId = pc.categoryId ';
        $sqlString = '';

        if(isset($data['data']['category'])){
            $sqlString .= $joinCategory . $whereString . ' AND c.categoryName = "' . $data['data']['category'] . '"';
            // $whereString .= $joinCategory . ' AND c.categoryName = "' . $data['data']['category'] . '"';
        }

        //distace km
        $places = DB::select(DB::raw('
        SELECT * FROM
        (
            SELECT DISTINCT t.touristicPlaceId, placeName, latitude, longitude, ( 6371 * ACOS( SIN( RADIANS( latitude ) ) * SIN( RADIANS( '. $data['data']['latitude'] . ' ) ) + COS( RADIANS( longitude - '. $data['data']['longitude'] .' ) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( '. $data['data']['latitude'] .' ) ) ) ) AS distance
            FROM touristicplace as t ' . $sqlString . 
            ' ORDER BY distance ASC )
        as dt
        WHERE dt.distance <' .$data['data']['distance']
        ));

        $results = TouristicObj::hydrate($places);

        /*foreach ($places as $place) {
            $place->distance = round($place->distance * 1000);
            //$place['rateAvg'] = round($place->rate->avg('puntuacion'));
        }*/

        foreach ($results as $result) {
            $result->distance = round($result->distance * 1000);
            $result['rateAvg'] = round($result->rate->avg('puntuacion'));
            unset($result['rate']);
        }

        try {

            return [
                'code' => 'OK',
                'get' => true,
                'data' => $results
            ];    
        } catch (\Throwable $th) {
            dd($th);
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }

    public function testMaps(Request $request){
        
        $path = storage_path() . "/json/response.json"; // ie: /var/www/laravel/app/storage/json/filename.json

        $json = json_decode(file_get_contents($path), true); 
        
        return $json;
    }

    public function getCommentsByTouristicPlace(Request $request){
        
        try {

            $data = $request->all();
        
            $queryData = CommentaryObj::where([
                ['touristicPlaceId', '=', $data['touristicPlace']['id']],
                ['commentaryStatus', '=', 'Active']
            ])->orderBy('created_at', 'desc')->get();

            $queryData->each(function($queryData){
                    
                //$queryData->touristicPlace;
                $queryData->user;                

            });

            return [
                'code' => 'OK',
                'get' => true,
                'data' => $queryData
            ]; 
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
        
    }

    public function setCommentary(Request $request){
        
        try {

            $data = $request->all();

            if ($data['action'] == 'save') {

                $data['data']['reports'] = 0;
                $data['data']['status'] = 'Active';

                $newCommentary = new CommentaryObj($data['data']);
                $newCommentary->save();

            } else if($data['action'] == 'update') {

                $updatedCommentary = CommentaryObj::where([
                    ['commentaryId', '=', $data['data']['commentaryId']],
                    ['userId', '=', $data['data']['userId']]
                ])->get()->first();

                $updatedCommentary->fill($data['data']);
                $updatedCommentary->save();

            } else if($data['action'] == 'delete') {

                CommentaryObj::where([
                    ['commentaryId', '=', $data['data']['commentaryId']],
                    ['userId', '=', $data['data']['userId']]
                ])->delete();
                

            } else if($data['action'] == 'report') {

                $commentary = CommentaryObj::where([
                    ['commentaryId', '=', $data['data']['commentaryId']]
                ])->get()->first();
                
                $data['data']['reports'] = $commentary['reports'] + 1;                
                $commentary->fill($data['data']);
                //dd($commentary['reports']);
                $commentary->save();
            }
        
            $queryData = CommentaryObj::where([
                ['touristicPlaceId', '=', $data['data']['touristicPlaceId']],
                ['commentaryStatus', '=', 'Active']
            ])->orderBy('created_at', 'desc')->get();

            $queryData->each(function($queryData){
                    
                $queryData->touristicPlace;
                $queryData->user;                 

            });

            return [
                'code' => 'OK',
                'get' => true,
                'data' => $queryData
            ]; 

        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
        
    }

    public function getProductImage($id)
    {
        $product = ProductObj::where('productId', '=', $id)->first();        
        $path = '';
        if(!isset($product)){
            $path = public_path(). '/images/notFound.png'; 
        }else {
            //dd($product->toArray());
            $path = public_path(). '/images/places/' . $product['touristicPlaceId'] . '/products/' .$product['productIcon'];
        }
        //dd($path);
        return response()->file($path);
    }

    public function getAllEvents(){
        try {

            $events = TouristicObj::where([
                ['placeStatusId', '=', 2],
                ['type', '=', 'event']
            ])->orderBy('startDate', 'desc')->get();

            return [
                'code' => 'OK',
                'get' => true,
                'data' => $events
            ]; 
        } catch (\Throwable $th) {
            return [
                'code' => 'Error',
                'get' => false,
                'data' => $th,
                'message' => [
                    'es' => 'No se encontro la informacion requerida',
                    'en' => 'The required information was not found'
                ]
            ];
        }
    }




    
}
