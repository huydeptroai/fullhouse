<div class="tab-content-item " id="review">
	<div class="wrap-review-form">
		<div id="review_form_wrapper">
			<div id="review_form">
				<div id="respond" class="comment-respond">
					@if(Auth::check())

					<p class="comment-notes">
						<span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
					</p>
					<form action="{{ route('review.store')}}" method="post" id="commentform" class="comment-form" novalidate="">
						<input type="hidden" name="product_id" value="{{$product->product_id}}">

						<div class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
							<div id="comment-20" class="comment_container">
								<div class="comment-text">

									<div class="col-md-3">
										<img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->getAvatar() }}" alt="User profile picture" height="80" width="80">
										<p class="meta">
											<strong class="woocommerce-review__author">
												{{ Auth::user()->name}}
											</strong>
										</p>
										<div class="comment-form-rating">
											<span>Your rating >> </span>
											<p class="stars" style="font-size: 20px;">
												<label for="rated-1"></label>
												<input type="radio" id="rated-1" name="rating" value="1">
												<label for="rated-2"></label>
												<input type="radio" id="rated-2" name="rating" value="2">
												<label for="rated-3"></label>
												<input type="radio" id="rated-3" name="rating" value="3">
												<label for="rated-4"></label>
												<input type="radio" id="rated-4" name="rating" value="4">
												<label for="rated-5"></label>
												<input type="radio" id="rated-5" name="rating" value="5" checked="checked">
											</p>
										</div>

									</div>
									<div class="description col-md-9">
										<textarea id="content" name="content" rows="8" required placeholder="You can enter here..." style="border:1px solid gray;width:100%;padding: 5px;"></textarea>
									</div>
								</div>
							</div>
						</div>

						<p class="form-submit">
							<input name="submit" type="submit" id="submit" class="submit" value="Send">
						</p>
					</form>
					@else
					<a href="{{ route('login')}}">Please login before to comment!</a>
					@endif
				</div><!-- .comment-respond-->
			</div><!-- #review_form -->
		</div><!-- #review_form_wrapper -->

		<div id="comments">
			<h2 class="woocommerce-Reviews-title">
				{{ count($product->reviews) }} review(s) for <span>{{$product->product_name}} {{$product->product_id}}</span>
			</h2>
			<hr>

			<ol class="commentlist" id="list_comment">
				@foreach($product->reviews as $review)

				<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="review_id_{{ $review->id }}">
					<div id="comment-20" class="comment_container col-md-8">
						<img class="profile-user-img img-fluid img-circle" src="{{ $review->user->getAvatar() }}" alt="User profile picture" height="80" width="80">

						<div class="comment-text">
							<!-- <div class="star-rating"> -->
							<div class="rating">
								@for($i=1; $i<=5; $i++) @php $color=($i <=$review->rating) ? "color: #ffcc00;" : "color: #ccc;";
									@endphp
									<i class="fa fa-star" aria-hidden="true" style="cursor:pointer;<?php echo $color ?> font-size:20px;"></i>
									@endfor

							</div>
							<p class="meta">
								<strong class="woocommerce-review__author">{{$review->user->name}}</strong>
								<span>–</span>
								<time class="woocommerce-review__published-date">
									{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->updated_at)->diffForHumans()}}
								</time>
							</p>
							<div class="description">
								<p>{{$review->content}}</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<a href="#" class="delete_review" data-id="{{$review->id}}">
							<svg style="width:20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
								<path d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
							</svg>
						</a>

					</div>
				</li>
				@endforeach
			</ol>

		</div><!-- #comments -->



	</div>
</div>