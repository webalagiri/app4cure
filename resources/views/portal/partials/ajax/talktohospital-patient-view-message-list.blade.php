<h3>Message Threads</h3>
<div class="line-xs"></div>

@if(!empty($getEnquiryInfo[0]->patient_image))
    <?php $pat_img = url() . str_replace('../public/', '/', $getEnquiryInfo[0]->patient_image);?>
@else
    <?php $pat_img = url() . '/images/patient/user.jpg';?>
@endif

@if(!empty($getEnquiryInfo[0]->hospital_photo))
    <?php $logo = $getEnquiryInfo[0]->hospital_photo; ?>
@else
    <?php $logo = url() . '/images/hospital/hospital.jpg';?>
@endif

@if(count($enquiryConversations)>0)
    @foreach($enquiryConversations as $conversation)
    <div class="row">
        <div class="col-md-2">
            @if(($conversation->from_role_id) == 2)
                <img class="img-circle msgthmb" src="{{$logo}}"/>
            @elseif(($conversation->from_role_id) == 4)
                <img class="img-circle msgthmb" src="{{$pat_img}}"/>
            @endif
        </div>
        <div class="col-md-10">
            <div class="msginn">

                <div>
                    @if(($conversation->from_role_id) == 2)
                        <b>Doctor Speaks..........</b>
                    @elseif(($conversation->from_role_id) == 4)
                        <b>Patient Speaks..........</b>
                    @endif
                </div>
                <div> <em><strong>Sent: {{$conversation->conversation_date}}</strong></em></div>
                <div>
                    {{$conversation->conversation_title}}<br/>
                    {{$conversation->conversation_description}}

                </div>
                <div class="line-xs"></div>
                <div class="attach">

                    @if(!empty($conversation->attachments))
                        @foreach($conversation->attachments as $conversation_attachments)
                            <i class="fa fa-paperclip"></i> {{$conversation_attachments->document_name}} (<i style="color:grey">{{$conversation_attachments->document_category_name}}</i>)
                            <a href="{{URL::to('user/' . $conversation_attachments->document_upload_path.'/download')}}" target="_blank">
                                <i class="fa fa-download"></i>
                            </a> |
                        @endforeach
                    @endif


                </div>


            </div>
        </div>
    </div><!--/row-->
    <div class="dividersmall clear"></div>

    <?php /* ?>
    <div class="row">

        <div class="col-md-10">
            <div class="msgsent">
                <div><em><strong>Received: 12 Feb 2016, 7PM</strong></em></div>
                <div>Vivamus blandit felis sed tincidunt ornare. Proin eget libero interdum, malesuada diam a, fermentum nibh. Fusce lobortis, erat nec rutrum porta, mi justo luctus justo, in egestas nisi odio non enim. Aliquam at lacus vitae nibh iaculis egestas. Morbi massa odio, commodo interdum felis a, euismod commodo diam. Duis enim nisi, tincidunt eget sagittis non, volutpat a tortor. Maecenas mauris neque, finibus sit amet ante in, fringilla pretium felis. Mauris vel lectus id orci tincidunt semper non in elit. In varius elit id nisi consequat hendrerit. Fusce at nisl tortor. </div>
                <div class="line-xs"></div>
                <div class="attach"><i class="fa fa-paperclip"></i> file01.pdf | report03.pdf | scan02.jpg</div>

            </div> </div>
        <div class="col-md-2"><img class="img-circle msgthmb" src="{{URL::to('/')}}/images/dev/apollo2.jpg"/></div>
    </div><!--/row-->
    <div class=" dividersmall clear"></div>
    <?php */ ?>

    @endforeach
@else
    <div class="row">
        <div class="col-md-12">
            No Message Found.
        </div>
    </div><!--/row-->
    <div class="dividersmall clear"></div>

@endif


<?php /* ?>
<div class="row">

    <div class="col-md-2"><img class="img-circle msgthmb" src="{{URL::to('/')}}/images/dev/profile1.jpg"/></div>
    <div class="col-md-10">
        <div class="msginn">
            <div> <em><strong>Sent: 12 Feb 2016, 4PM</strong></em></div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer turpis risus, tincidunt nec tristique at, aliquam in neque. Sed ut volutpat metus. Quisque malesuada aliquam pellentesque. Mauris nibh arcu, vestibulum et luctus non, scelerisque pellentesque justo. Integer semper maximus vulputate. Nunc gravida a ipsum ac pulvinar. Nullam vestibulum eros non iaculis iaculis. Nam porta efficitur lorem sit amet viverra. Maecenas vitae risus nec augue vehicula vulputate at vel purus. Sed quis odio ac nunc rutrum volutpat lobortis sit amet arcu. </div>
            <div class="line-xs"></div>
            <div class="attach"><i class="fa fa-paperclip"></i> file01.pdf | report03.pdf | scan02.jpg</div>


        </div></div></div><!--/row-->
<div class="dividersmall clear"></div>


<div class="row">

    <div class="col-md-10">
        <div class="msgsent">
            <div><em><strong>Received: 12 Feb 2016, 7PM</strong></em></div>
            <div>Vivamus blandit felis sed tincidunt ornare. Proin eget libero interdum, malesuada diam a, fermentum nibh. Fusce lobortis, erat nec rutrum porta, mi justo luctus justo, in egestas nisi odio non enim. Aliquam at lacus vitae nibh iaculis egestas. Morbi massa odio, commodo interdum felis a, euismod commodo diam. Duis enim nisi, tincidunt eget sagittis non, volutpat a tortor. Maecenas mauris neque, finibus sit amet ante in, fringilla pretium felis. Mauris vel lectus id orci tincidunt semper non in elit. In varius elit id nisi consequat hendrerit. Fusce at nisl tortor. </div>
            <div class="line-xs"></div>
            <div class="attach"><i class="fa fa-paperclip"></i> file01.pdf | report03.pdf | scan02.jpg</div>

        </div> </div>
    <div class="col-md-2"><img class="img-circle msgthmb" src="{{URL::to('/')}}/images/dev/apollo2.jpg"/></div>
</div><!--/row-->
<div class=" dividersmall clear"></div>

<div class="row">
    <div class="col-md-2"><img class="img-circle msgthmb" src="{{URL::to('/')}}/images/dev/profile1.jpg"/></div>
    <div class="col-md-10">
        <div class="msginn">
            <div><em><strong>Sent: 15 Feb 2016, 10AM</strong></em></div>
            <div>Curabitur consectetur vitae ipsum quis semper. Nunc vestibulum sapien vel velit mattis vulputate. Duis et nisi nec nisl luctus consectetur vitae eu risus. Donec lectus felis, convallis vel aliquam facilisis, cursus nec ligula. Praesent ac nunc dapibus, mattis turpis eu, elementum dolor. Nullam nec gravida neque. Nam fermentum in risus lobortis aliquam. Nulla facilisi. Nunc tempus urna eu ullamcorper ultrices. Quisque tincidunt enim at ligula ullamcorper accumsan. Phasellus eget consectetur sapien, eu semper metus. Nam ac massa sit amet dui tempus cursus. Morbi ut imperdiet sem. Integer at felis neque. Maecenas a odio at nulla dignissim sagittis in id mauris.  </div>
            <div class="line-xs"></div>
            <div class="attach"><i class="fa fa-paperclip"></i> file01.pdf | report03.pdf | scan02.jpg</div>

        </div></div>
</div><!--/row-->
<div class="dividersmall clear"></div>


<div class="row">

    <div class="col-md-10">
        <div class="msgsent">
            <div><em><strong>Received: 16 Feb 2016, 1PM</strong></em></div>
            <div>Maecenas mauris neque, finibus sit amet ante in, fringilla pretium felis. Mauris vel lectus id orci tincidunt semper non in elit. In varius elit id nisi consequat hendrerit. Fusce at nisl tortor. </div>
            <div class="line-xs"></div>
            <div class="attach"><i class="fa fa-paperclip"></i> file01.pdf | report03.pdf | scan02.jpg</div>
        </div> </div>
    <div class="col-md-2"><img class="img-circle msgthmb" src="{{URL::to('/')}}/images/dev/apollo2.jpg"/></div>
</div><!--/row-->
<div class=" dividersmall clear"></div>
<?php */ ?>

