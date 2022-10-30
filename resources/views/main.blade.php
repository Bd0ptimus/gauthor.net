
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

@include('layouts.layoutMaster')
@extends('layouts.layoutMasterStyle')


<body onload="mainPageOnload()">

	{{-- <div class="fh5co-loader"></div> --}}

	<div id="page" >
        @include('layouts.navbar1')

		<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{asset('front/images/img_bg_2.jpg')}}"
			data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container" >
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1 id="web-title">Bùi Dũng &amp; Minh Hằng</h1>
								<h2>We Are In Love</h2>
								<div class="countup" id="countup1">
									<div class="timer-container">
										<div class="timeel"><p class="days time-text"></p></div>
										<div class="timeel timeRefDays">days</div>
									</div>
									<div class="timer-container">
										<div class="timeel"><p class="hours time-text"></p></div>
										<div class="timeel timeRefHours">hours</div>
									</div>
									<div class="timer-container">
										<div class="timeel"><p class="minutes time-text"></p></div>
										<div class="timeel timeRefMinutes">minutes</div>
									</div>
									<div class="timer-container">
										<div class="timeel"><p class="seconds time-text"></p></div>
										<div class="timeel timeRefSeconds">seconds</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="fh5co-couple">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<h2>Hello!</h2>
						<h3>Từ ngày 9 tháng 8 năm 2022, Hà Nội, Việt Nam</h3>
						<p>Chúng tôi bắt đầu yêu nhau</p>
					</div>
				</div>
				<div class="couple-wrap animate-box">
					<div class="couple-half">
						<div class="groom">
							<img src="{{asset('front/images/groom.jpg')}}" alt="groom" class="img-responsive">
						</div>
						<div class="desc-groom">
							<h3>Bùi Thế Dũng</h3>
							<p>Gì đó về Gấu</p>
						</div>
					</div>
					<p class="heart text-center"><i class="fa-solid fa-heart" style="color:red;"></i></p>
					<div class="couple-half">
						<div class="bride">
							<img src="{{env('APP_URL')}}/loving-web/public/front/images/bride.jpg" alt="groom" class="img-responsive">
						</div>
						<div class="desc-bride">
							<h3>Lê Minh Hằng</h3>
							<p>Gì đó về Thỏ</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-event" class="fh5co-bg" style="background-image:url({{asset('front/images/img_bg_3.jpg')}}">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<span>Dự định</span>
						<h2>Event tiếp theo</h2>
					</div>
				</div>
				<div class="row">
					<div class="display-t">
						<div class="display-tc">
							<div class="col-md-10 col-md-offset-1" style="display:flex; justify-content: center;">
								<div class="col-md-6 col-sm-6 text-center">
									<div class="event-wrap animate-box">
										<h3>Du lịch Sapa</h3>
										<div class="event-col">
											<i class="fa-regular fa-clock fa-xl"></i>
											<span>0:00 PM</span>
											<!-- <span>12:00 AM</span> -->
										</div>
										<div class="event-col">
											<i class="fa-regular fa-calendar-days fa-xl"></i>
											<span>Thứ sáu, 13 tháng 1, 2023</span>
										</div>
										<p>Mô tả về dự định
										</p>
									</div>
								</div>
								<!-- <div class="col-md-6 col-sm-6 text-center">
									<div class="event-wrap animate-box">
										<h3>Wedding Party</h3>
										<div class="event-col">
											<i class="icon-clock"></i>
											<span>7:00 PM</span>
											<span>12:00 AM</span>
										</div>
										<div class="event-col">
											<i class="icon-calendar"></i>
											<span>Monday 28</span>
											<span>November, 2016</span>
										</div>
										<p>Far far away, behind the word mountains, far from the countries Vokalia and
											Consonantia, there live the blind texts. Separated they live in
											Bookmarksgrove right at the coast of the Semantics, a large language ocean.
										</p>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-couple-story">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<!-- <span>We Love Each Other</span> -->
						<h2>Câu chuyện của chúng tôi</h2>
						<p>Câu chuyện</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-md-offset-0">
						<ul class="timeline animate-box">
							<li class="animate-box">
								<div class="timeline-badge" style="background-image:url({{asset('front/images/couple-1.jpg')}}"></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h3 class="timeline-title">Lần đầu chúng ta làm quen</h3>
										<span class="date">2016</span>
									</div>
									<div class="timeline-body">
										<p>
											Đôi chút về câu chuyện
										</p>
									</div>
								</div>
							</li>

							<li class="animate-box">
								<div class="timeline-badge" style="background-image:url({{asset('front/images/couple-1.jpg')}}"></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h3 class="timeline-title">Yêu nhau lần 1</h3>
										<span class="date">2016</span>
									</div>
									<div class="timeline-body">
										<p>
											Đôi chút về câu chuyện
										</p>
									</div>
								</div>
							</li>

							<li class="animate-box">
								<div class="timeline-badge" style="background-image:url({{asset('front/images/couple-1.jpg')}}"></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h3 class="timeline-title">Chia tay và quay lại</h3>
										<span class="date">2016, 2017</span>
									</div>
									<div class="timeline-body">
										<p>
											Đôi chút về câu chuyện
										</p>
									</div>
								</div>
							</li>

							<li class="animate-box">
								<div class="timeline-badge" style="background-image:url({{asset('front/images/couple-1.jpg')}}"></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h3 class="timeline-title">Lại trở về bên nhau</h3>
										<span class="date">9  tháng 8, 2022</span>
									</div>
									<div class="timeline-body">
										<p>
											Đôi chút về câu chuyện
										</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-gallery"  style="background-image:url({{asset('front/images/img_bg_5.jpg')}}"> <!--class="fh5co-section-gray"-->
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<span>Kỷ niệm của chúng tôi</span>
						<h2>Kho ảnh</h2>
						<p></p>
					</div>
				</div>
				<div class="row row-bottom-padded-md">
					<div class="col-md-12">
						<ul id="fh5co-gallery-list">

							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('front/images/gallery-1.jpg')}} ">
								<a href="images/gallery-1.jpg">
									<div class="case-studies-summary">
										<span>14 Photos</span>
										<h2>Album 1</h2>
									</div>
								</a>
							</li>
							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('front/images/gallery-1.jpg')}}">
								<a href="#" class="color-2">
									<div class="case-studies-summary">
										<span>30 Photos</span>
										<h2>Album 2</h2>
									</div>
								</a>
							</li>


							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('/front/images/gallery-1.jpg')}});">
								<a href="#" class="color-3">
									<div class="case-studies-summary">
										<span>90 Photos</span>
										<h2>Album 3</h2>
									</div>
								</a>
							</li>
							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('/front/images/gallery-1.jpg')}});">
								<a href="#" class="color-4">
									<div class="case-studies-summary">
										<span>12 Photos</span>
										<h2>Album 4</h2>
									</div>
								</a>
							</li>

							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('/front/images/gallery-1.jpg')}});">
								<a href="#" class="color-3">
									<div class="case-studies-summary">
										<span>50 Photos</span>
										<h2>Album 5</h2>
									</div>
								</a>
							</li>
							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('/front/images/gallery-1.jpg')}}); ">
								<a href="#" class="color-4">
									<div class="case-studies-summary">
										<span>45 Photos</span>
										<h2>Album 6</h2>
									</div>
								</a>
							</li>

							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('/front/images/gallery-1.jpg')}});">
								<a href="#" class="color-4">
									<div class="case-studies-summary">
										<span>35 Photos</span>
										<h2>Album 7</h2>
									</div>
								</a>
							</li>

							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('/front/images/gallery-1.jpg')}});">
								<a href="#" class="color-5">
									<div class="case-studies-summary">
										<span>90 Photos</span>
										<h2>Album 8</h2>
									</div>
								</a>
							</li>
							<li class="one-third animate-box" data-animate-effect="fadeIn"
								style="background-image: url({{asset('/front/images/gallery-1.jpg')}});">
								<a href="#" class="color-6">
									<div class="case-studies-summary">
										<span>56 Photos</span>
										<h2>Album 9</h2>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-counter" class="fh5co-bg fh5co-counter" >
			<!-- <div class="overlay"></div> -->
			<div class="container">
				<div class="row">
					<div class="display-t">
						<div class="display-tc">
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="fa-solid fa-calendar-days"></i>
									</span>

									<span id="day-counter" class="counter js-counter" data-from="0" data-speed="2500"
										data-refresh-interval="50">0</span>
									<span class="counter-label">Số ngày bên nhau</span>

								</div>
							</div>

							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="fa-regular fa-clock"></i>
									</span>

									<span id="hour-counter" class="counter js-counter" data-from="0"  data-speed="2500"
										data-refresh-interval="50">1</span>
									<span class="counter-label">Số giờ bên nhau</span>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="fh5co-started" class="fh5co-bg" style="background-image:url({{asset('front/images/img_bg_4.jpg')}}">
			<div class="overlay"></div>
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Liên hệ chúng tôi</h2>
						<p>Hãy điền đầy đủ vào các field sau.</p>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-10 col-md-offset-1">
						<form class="form-inline">
							<div class="col-md-4 col-sm-4">
								<div class="form-group">
									<label for="name" class="sr-only">Tên của bạn</label>
									<input type="name" class="form-control" id="name" placeholder="Tên của bạn">
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email">
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<button type="submit" class="btn btn-default btn-block">Gửi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

        @extends('layouts.footer')
        @extends('layouts.layoutMasterScript')

	</div>


    <script>
		var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

		// default example
		simplyCountdown('.simply-countdown-one', {
			year: d.getFullYear(),
			month: d.getMonth() + 1,
			day: d.getDate()
		});

		//jQuery example
		$('#simply-countdown-losange').simplyCountdown({
			year: d.getFullYear(),
			month: d.getMonth() + 1,
			day: d.getDate(),
			enableUtc: false
		});


        function mainPageOnload(){
            // Month Day, Year Hour:Minute:Second, id-of-element-container
            countUpFromTime("Aug 9, 2022 00:00:00", 'countup1'); // ****** Change this line!
        }
		function countUpFromTime(countFrom, id) {
			countFrom = new Date(countFrom).getTime();
			var now = new Date(),
				countFrom = new Date(countFrom),
				timeDifference = (now - countFrom);

			var secondsInADay = 60 * 60 * 1000 * 24,
				secondsInAHour = 60 * 60 * 1000;

			days = Math.floor(timeDifference / (secondsInADay) * 1);
			hours = Math.floor((timeDifference % (secondsInADay)) / (secondsInAHour) * 1);
			mins = Math.floor(((timeDifference % (secondsInADay)) % (secondsInAHour)) / (60 * 1000) * 1);
			secs = Math.floor((((timeDifference % (secondsInADay)) % (secondsInAHour)) % (60 * 1000)) / 1000 * 1);

			var idEl = document.getElementById(id);
			idEl.getElementsByClassName('days')[0].innerHTML = days;
			idEl.getElementsByClassName('hours')[0].innerHTML = hours;
			idEl.getElementsByClassName('minutes')[0].innerHTML = mins;
			idEl.getElementsByClassName('seconds')[0].innerHTML = secs;

			var dataForShowing = [
				{
					'id_interact' : 'day-counter',
					'value' : days
				},
				{
					'id_interact' : 'hour-counter',
					'value' : hours+24*days
				}
			];
            // console.log('test : ' + JSON.stringify(dataForShowing));

			setCounterInterfaceSection(dataForShowing);
            console.log('test : ' + JSON.stringify(dataForShowing));
			clearTimeout(countUpFromTime.interval);
			countUpFromTime.interval = setTimeout(function () { countUpFromTime(countFrom, id); }, 1000);
		}

		function setCounterInterfaceSection(dataForShowing){
			dataForShowing.forEach(function(data){
				document.getElementById(data['id_interact']).setAttribute('data-to', data['value']);
			})
		}


	</script>
</body>

</html>
