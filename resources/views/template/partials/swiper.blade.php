      <!-- Swiper -->
      <div class="swiper-container">
        <div class="swiper-wrapper">
        @foreach($lugares as $lugar)
            <div class="swiper-slide"> 
              <div class="card" style="width: 18rem;">
              <img src="{{URL::asset('/images/travel-1.1.jpg')}}" alt="">
              <div class="card-img-overlay">
                <h5 class="card-title">{{$lugar}}</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text">Last updated 3 mins ago</p>
              </div>
              </div>
            </div>
            <!-- Add Pagination -->
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
      </div>
      