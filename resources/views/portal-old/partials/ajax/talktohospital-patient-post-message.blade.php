<h3>Compose Message</h3>
<div class="line-xs"></div>
<div class="row"><div class="col-md-6">  <!-- Compose -->
        <div class="box">
            <div class="box-header">
                <h4>Compose Message</h4>

            </div><!-- /.box-header -->
            <div class="box-body pad">
                <form>
                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </form>
            </div>


            <label for="billing-form-Name">Choose from your existing Medical Documents:</label>
            <div id="attachmentx-form" class="bordergrayX">
                <div class="form-group" id="MedicalFiles">
                    No documents found.
                </div>
            </div>


            <label for="billing-form-Name">Upload your Medical Documents:</label>
            <div id="attachment-form" class="bordergrayX">
                <div class="form-group">
                    <div class="col-xs-3">
                        {!! Form::hidden('medical_new_document[0][medical_document_id]', '0', array('id'=>'medical_new_document[0][medical_document_id]', 'name'=>'medical_new_document[0][medical_document_id]', 'value'=>'0'))!!}
                        <select class="form-control" name="medical_new_document[0][document_category_id]" >
                            <option value="">--Choose--</option>
                            @foreach ($CategoryList as $CategoryInfo)
                                @if(!empty($CategoryInfo->id))
                                    <option value="{{$CategoryInfo->id}}">{{$CategoryInfo->document_category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" name="medical_new_document[0][document_name]" placeholder="Title" />
                    </div>
                    <div class="col-xs-4">
                        <input type="file" class="form-control" name="medical_new_document[0][document_upload_path]" />
                    </div>
                    <div class="col-xs-1">
                        <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                    </div>
                </div>


                <div class="form-group hide" id="bookTemplate">
                    <div class="col-xs-3">
                        {!! Form::hidden('medical_document_id', '0', array('id'=>'medical_document_id', 'name'=>'medical_document_id', 'value'=>'0'))!!}
                        <select class="form-control" name="document_category_id" >
                            <option value="">--Choose--</option>
                            @foreach ($CategoryList as $CategoryInfo)
                                @if(!empty($CategoryInfo->id))
                                    <option value="{{$CategoryInfo->id}}">{{$CategoryInfo->document_category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" name="document_name" placeholder="Title" />
                    </div>
                    <div class="col-xs-4">
                        <input type="file" class="form-control" name="document_upload_path" />
                    </div>
                    <div class="col-xs-1">
                        <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>



            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="dividersmall"></div>
        </div>
        <!-- /Compose -->

    </div>
    <div class="col-md-6">
        <h4>Choose from attachments.</h4>
        <div class="row"><div class="col-md-6"><i class="fa fa-paperclip"></i> Medical Presciption</div><div class="col-md-6"><i class="fa fa-paperclip"></i> Test Report 1</div><div class="col-md-6"><i class="fa fa-paperclip"></i> Treatment Summary</div><div class="col-md-6"><i class="fa fa-paperclip"></i> Scanned copy</div>
        </div>
        <div class="dividersmall"></div>
        <div class="row">
    </div>

</div>