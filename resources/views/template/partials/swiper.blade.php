<div class="card">
  <div class="card-body"> 
    
<div class="row">

  <div class="col-md-3" style="margin-top: 10%">
    <h4>Destinos populares <i class="fas fa-plane"></i></h4>
    <p class="lead text-center text-md-left text-muted mb-6 mb-lg-8">
      Navega y explora entre los destinos mas populares.
    </p>
  </div>
  <div class="col-md-9">
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
      @foreach($lugares as $lugar)
          <div class="swiper-slide"> 
            <div class="card" style="width: 18rem;">
            <img height="300px" src="{{ asset('images/places/' . $lugar->touristicPlaceId . '/' . $lugar->mainImage) }}" alt="" class="rounded-circle">
            <div class="card-img-overlay">
              <h5 class="card-title">{{$lugar['placeName']}}</h5>
              <p class="card-text">{{ $lugar['description'] }}</p>
              <!--<p class="card-text">Last updated 3 mins ago</p>-->
            </div>
            </div>
          </div>
          <!-- Add Pagination -->
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
  </div>

</div>

</div>
</div>  