@extends('layout.admin_master')
@section('title','Home')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Home Page Text</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <form action="{{ route('admin.home.update')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf

                            <input type="hidden" name="page_id"  value="{{ $HomeText->id }}">
                            <div class="col-sm-6 form-group">
                                <label>Heading1</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder=""    name="head1" value="{{ $HomeText->head1}}" >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Heading1 sub-text</label>
                                <input class="form-control @error('subhead1') is-invalid @enderror" type="text" value="{{ $HomeText->subhead1}}"  placeholder="" name="subhead1">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Heading2</label>
                                <input class="form-control @error('head2') is-invalid @enderror" type="text" value="{{ $HomeText->head2}}"  placeholder=""    name="head2">

                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Heading2 sub-text</label>
                                <input class="form-control @error('subhead2') is-invalid @enderror" type="text" value="{{ $HomeText->subhead2}}"  placeholder="" name="subhead2">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Heading3</label>
                                <input class="form-control @error('head3') is-invalid @enderror" type="text" value="{{ $HomeText->head3}}"  placeholder=""    name="head3">

                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Heading3 sub-text</label>
                                <input class="form-control @error('subhead3') is-invalid @enderror" type="text" value="{{ $HomeText->subhead3}}"  placeholder="" name="subhead3">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Heading4</label>
                                <input class="form-control @error('head4') is-invalid @enderror" type="text" value="{{ $HomeText->head4}}"  placeholder=""    name="head4">

                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Heading4 sub-text</label>
                                <input class="form-control @error('subhead4') is-invalid @enderror" type="text" value="{{ $HomeText->subhead4}}"  placeholder="" name="subhead4">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Analytics Footer Content</label>
                                <input class="form-control @error('footerContent') is-invalid @enderror" type="text" value="{{ $HomeText->footerContent}}"  placeholder="" name="footerContent">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Service Content</label>
                                <input class="form-control report-txt @error('serviceContent') is-invalid @enderror" type="textarea" value="{{ $HomeText->serviceContent}}"  placeholder="" name="serviceContent">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label style="display: block">Upload Image</label>
                                <input id="file-upload" type="file"    name="head1img"/>
                            </div>

                            <div class="col-sm-4 form-group">
                                     @if($HomeText->head1img == '')
                                            @php $img1 = 'no_img.png';  @endphp
                                     @else
                                            @php $img1 = $HomeText->head1img;  @endphp
                                     @endif
                                    <img src="{{asset('public/storage/data/'.$img1)}}" alt="" class="img-thumbnail" width="100">
                            </div>



                            <div class="col-sm-4 form-group">
                                <label style="display: block">Industiry Content</label>
                                <input class="form-control report-txt @error('industiryContent') is-invalid @enderror" type="textarea" value="{{ $HomeText->industiryContent}}"  placeholder="" name="industiryContent">
                            </div>
                            <div class="col-sm-4 form-group">
                            <label style="display: block">Upload Image</label>
                                <input id="file-upload" type="file"    name="head2img"/>
                            </div>
                            <div class="col-sm-4 form-group">
                                @if($HomeText->head2img == '')
                                       @php $img1 = 'no_img.png';  @endphp
                                @else
                                       @php $img1 = $HomeText->head2img;  @endphp
                                @endif
                               <img src="{{asset('public/storage/data/'.$img1)}}" alt="" class="img-thumbnail" width="100">
                            </div>





                            <div class="col-sm-4 form-group">
                                <label>Our Insights Content</label>
                                <input class="form-control report-txt @error('insightsContent') is-invalid @enderror" type="textarea" value="{{ $HomeText->insightsContent}}"  placeholder="" name="insightsContent">
                            </div>
                            <div class="col-sm-4 form-group">
                            <label style="display: block">Upload Image</label>
                                <input id="file-upload" type="file"    name="head3img"/>
                            </div>
                            <div class="col-sm-4 form-group">
                                @if($HomeText->head3img == '')
                                       @php $img1 = 'no_img.png';  @endphp
                                @else
                                       @php $img1 = $HomeText->head3img;  @endphp
                                @endif
                               <img src="{{asset('public/storage/data/'.$img1)}}" alt="" class="img-thumbnail" width="100">
                            </div>







                            <div class="col-sm-4 form-group">
                                <label>Our Analysis Content</label>
                                <input class="form-control report-txt @error('analysisContent') is-invalid @enderror" type="textarea" value="{{ $HomeText->analysisContent}}"  placeholder="" name="analysisContent">
                            </div>
                            <div class="col-sm-4 form-group">
                            <label style="display: block">Upload Image</label>
                                <input id="file-upload" type="file"    name="head4img"/>
                            </div>

                            <div class="col-sm-4 form-group">
                                @if($HomeText->head4img == '')
                                       @php $img1 = 'no_img.png';  @endphp
                                @else
                                       @php $img1 = $HomeText->head4img;  @endphp
                                @endif
                               <img src="{{asset('public/storage/data/'.$img1)}}" alt="" class="img-thumbnail" width="100">
                            </div>

                            {{-- <div class="col-sm-4 form-group">
                                <label>Logo</label>
                                <input class="form-control report-txt @error('logo') is-invalid @enderror" type="file"
                                name="logo">
                            </div> --}}
                    </div>
                    <button class="btn btn-info" type="submit"> Update  </button>
                </form>
            </div>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

</div>


@endsection
