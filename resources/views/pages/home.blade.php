@extends('layouts.app')

@section('content')

	<div id="myCarousel" class="carousel slide home-carousel" data-ride="carousel" >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="/images/calling.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h1>Need Advice for your Startup?</h1>
              <p>Book a meeting with any expert, we will connect you!</p>
              <p><a class="btn btn-lg btn-expert" href="#" role="button">Browse Expert</a></p>
            </div>
          </div>
        </div>
        {{--<div class="item">--}}
          {{--<img class="second-slide" src="http://images6.fanpop.com/image/photos/37700000/transparent-Hiro-big-hero-6-37747465-427-378.png" alt="Second slide">--}}
          {{--<div class="container">--}}
            {{--<div class="carousel-caption">--}}
              {{--<h1>Another example headline.</h1>--}}
              {{--<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>--}}
              {{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<div class="item">--}}
          {{--<img class="third-slide" src="http://www.thedailystar.net/sites/default/files/styles/very_big_2/public/news/images/ishita.jpg?itok=cxw6KPt7" alt="Third slide">--}}
          {{--<div class="container">--}}
            {{--<div class="carousel-caption">--}}
              {{--<h1>One more for good measure.</h1>--}}
              {{--<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>--}}
              {{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    <section>
      <div class="solid-background-negative">
        <div class="container">
          <div class="row text-center">
            <h1>How It Works</h1>
            {{--<p>Experts make your life easy. They can help anyway necessary.</p>--}}
          
              <div class="outer">
              <div class="steps">
                <h4>Step 1</h4>
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <h2>Find Expert</h2>
                <p>Browse our website to find the right expert for you.</p>
              </div>
              <div class="steps">
                <h4>Step 2</h4>
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                <h2>Request Meeting</h2>
                <p>Tell us why, when and how long you want to talk.</p>
              </div>
              <div class="steps">
                <h4>Step 3</h4>
                <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                <h2>Get Advice</h2>
                <p>We shall connect you with the expert over phone.</p>
              </div>
               
              </div>
         
          </div>
        </div>
      </div>
      
    </section>

   	<section>
      <div class="solid-background-positive">
        <div class="container">
          <div class="row text-center">
            <h1>Our Experts</h1>
            <p>Experts make your life easy. They can help anyway necessary.</p>
              <div class="row">
                <div class="outer">
                   {{--@for ($i = 0; $i < 10; $i++)--}}
                   @foreach($experts as $expert)


                      @include('expert.single_expert_card')
                     {{-- @endfor --}}
                    @endforeach
                </div>
              </div>
              <div class="row">
                <h2>Want to see all our experts?</h2>
                <a href="{{ url('/expert') }}" class="btn btn-browse-expert">Browse Experts</a>
              </div>
          </div>
        </div>
      </div>
   		
   	</section>

    <section>
      <div class="solid-background-footer">
        <div class="container">
          <div class="row text-center">
            <p>We have just launched something special for you. Stay with us!</p>
          </div>
        </div>
      </div>
      
    </section>

   	
@endsection