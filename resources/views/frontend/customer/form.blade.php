@extends('frontend.layouts.app')

@section('title', 'Enquiry Form')

@section('content')
    <div class="container login-section p-2">
        <div class="row d-flex align-items-center justify-content-start">
            <div class="col-md-5 pt-5 ">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{asset('images/1.png')}}" class="img img-fluid">
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="mt-10 p-2">

                            @if(Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success mt-3 mb-3" id="alert_message">
                                    {{Illuminate\Support\Facades\Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form method="GET" id="enquiry_form" name="enq" class="form form-group p-3 border border-2 rounded" action="{{ route('customerform.store',['headers'=> $campaign->name, 'user_agent'=> $campaign->id]) }}">
                                @csrf
                                @if(isset($campaign))
                                    <input type="hidden" name="campaign_id" id="" value="{{$campaign->id}}">
                                @endif
                                <input type="hidden" name="source" id="" value="registration">
                                <div class="text-center form3-head d-flex justify-content-center align-content-center">
                                    <h3 class="text-uppercase">Register now</h3>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <input required="required" placeholder="Enter Your Name" id="first-name" class="form-control"
                                            name="name" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <input required="required" placeholder="Enter Your Email" id="email" class="form-control"
                                            name="email" type="email">
                                    </div>

                                    <div class="form-group col-6">
                                        <input required="required" placeholder="Enter Your Phone" id="phone" class="form-control"
                                            name="phone" type="number">
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="form-group col-4">
                                        <select name="highest_qualification" class="form-control">
                                            <option value="" disabled selected>Select Qualification</option>
                                            @foreach ($qualifications as $qualification)
                                                <option value="{{$qualification->name}}">{{$qualification->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-4">
                                        <input placeholder="Grade" class="form-control"
                                            name="highest_grade" type="text">

                                    </div>

                                    <div class="form-group col-4">
                                        <input placeholder="Stream" class="form-control"
                                            name="highest_stream" type="text">

                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group col-6">
                                        <select name="test_name" class="form-control">
                                            <option value="" disabled selected>Select Test Preparation</option>
                                            @foreach ($preparations as $preparation)
                                                <option value="{{$preparation->name}}">{{$preparation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-6">
                                        <input placeholder="Enter Your Test Score " class="form-control"
                                            name="test_score" type="text">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group col-12">
                                        <select name="intrested_course[]" data-placeholder="Please Select Intrested Course" class="form-control offerd_course mt-1 mt-2" multiple>
                                            @foreach ($campaign_course as $course)
                                                <option value="{{$course}}">{{$course}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 justify-content-center align-center">
                                        <button type="submit" title="Submit Your Message!" class="btn btn-submit" name="submit"
                                            value="Submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-specific-scripts')
    <script>
        $('.offerd_course').select2({
        });

        setTimeout(() => {
            $('#alert_message').hide();
        }, 6000);

        $('#enquiry_form').submit(function(){
            $(this).find(':input[type=submit]').prop('disabled', true);
        });
    </script>
@endsection
