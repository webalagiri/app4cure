<div class="row">


<div class="col-md-12">
    @if(!is_null($feedbackReviews))
    <?php $sr=0; ?>
    @foreach($feedbackReviews as $feedbackReviewsDetails)
    <?php $sr++; ?>
    <div class="row ">

        <div class="col-md-12"><h4>{{$feedbackReviewsDetails->category_name}}</h4>



        </div>

        <div class="dividersmall"></div>
        @foreach($feedbackReviewsDetails->questions as $feedbackReviewsQuestions)
        <div class="col-md-8"><span class="nratitit">{{$feedbackReviewsQuestions->question_name}}</span></div>
        <div class="col-md-2">
            @if($feedbackReviewsQuestions->ratings_id==1)
                <i class="icon-star3"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
            @elseif($feedbackReviewsQuestions->ratings_id==2)
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
            @elseif($feedbackReviewsQuestions->ratings_id==3)
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
            @elseif($feedbackReviewsQuestions->ratings_id==4)
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star-empty"></i>
            @elseif($feedbackReviewsQuestions->ratings_id==5)
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
            @else
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
                <i class="icon-star-empty"></i>
                @endif
            <!--
            <span class="product-rating nratiico">
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star-empty"></i>
            </span>
            <span class="nratitxt"></span>

            -->
        </div>
        <div class="col-md-2">
            {{$feedbackReviewsQuestions->rating_name}}
        </div>

        <div class="clear"></div>
        @endforeach

    </div>


    <div class="dividersmall"></div>

    @endforeach

    @else

        <div class="row ">

            <div class="col-md-12"> No Review</div>

        </div>
    @endif


</div>

</div>