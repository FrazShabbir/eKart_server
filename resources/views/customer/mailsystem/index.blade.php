@extends('layout.master')
@section('title', 'Home')
@section('customStyle')

@endsection
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <div class="breadcrumb__links">
                        <a href="{{ route('homePage') }}">Home</a> /
                        <span>My Account</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop spad">
    <div class="container-fluid">
        <div class="row">
            @include('layout.customerMenu')
            <div class="col-lg-10 content-wrap content-reponsive">
                <div class="content-main pdbtm-none">
                    <div class="col-lg-12 col-md-12 edit-block">
                        <h6 class="checkout__title">Chat With Support</h6>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="text-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        <div class="messaging">
                            <div class="inbox_msg">
                                <div class="inbox_people">
                                 
                                    <div class="inbox_chat scroll">
                                        <a href="#">
                                            <div class="chat_list active_chat">
                                                <div class="chat_people">
                                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                                            alt="sunil"> </div>
                                                    <div class="chat_ib">
                                                        <h5>Support</h5>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                  
                                        
                                    </div>
                                </div>
                                <div class="mesgs">
                                    <div class="msg_history">
                                        @foreach ($chats as $chat )
                                        @if ($chat->user_id == auth()->user()->id)
                                        <div class="outgoing_msg">
                                            <div class="sent_msg">
                                                <p>{{$chat->message}}</p>
                                                <span class="time_date">{{ date('h:m',strtotime($chat->created_at)) }} | {{ date('d-M-Y',strtotime($chat->created_at)) }}</span>
                                            </div>
                                        </div> 
                                        @else
                                      
                                        <div class="incoming_msg">
                                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                                    alt="sunil"> </div>
                                            <div class="received_msg">
                                                <div class="received_withd_msg">
                                                    <p>{{$chat->message}}</p>
                                                    <span class="time_date">{{ date('h:m',strtotime($chat->created_at)) }} | {{ date('d-M-Y',strtotime($chat->created_at)) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                               
                                   
                                    </div>
                                    <div class="type_msg">
                                        <div class="input_msg_write">
                                            <form action="{{route('customer.customer.chat.save')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                <input type="text" class="write_msg" placeholder="Type a message" name="message">
                                                <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .inbox_people {
                                background: #fff;
                                float: left;
                                overflow: hidden;
                                width: 30%;
                                border-right: 1px solid #ddd;
                            }
            
                            .inbox_msg {
                                border: 1px solid #ddd;
                                clear: both;
                                overflow: hidden;
                                background-color: #fff;
                            }
            
                            .top_spac {
                                margin: 20px 0 0;
                            }
            
                            .recent_heading {
                                float: left;
                                width: 40%;
                            }
            
                            .srch_bar {
                                display: inline-block;
                                text-align: right;
                                width: 60%;
                                padding:
                            }
            
                            .headind_srch {
                                padding: 10px 29px 10px 20px;
                                overflow: hidden;
                                border-bottom: 1px solid #c4c4c4;
                            }
            
                            .recent_heading h4 {
                                color: #0465ac;
                                font-size: 16px;
                                margin: auto;
                                line-height: 29px;
                            }
            
                            .srch_bar input {
                                outline: none;
                                border: 1px solid #cdcdcd;
                                border-width: 0 0 1px 0;
                                width: 80%;
                                padding: 2px 0 4px 6px;
                                background: none;
                            }
            
                            .srch_bar .input-group-addon button {
                                background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                                border: medium none;
                                padding: 0;
                                color: #707070;
                                font-size: 18px;
                            }
            
                            .srch_bar .input-group-addon {
                                margin: 0 0 0 -27px;
                            }
            
                            .chat_ib h5 {
                                font-size: 15px;
                                color: #464646;
                                margin: 0 0 8px 0;
                            }
            
                            .chat_ib h5 span {
                                font-size: 13px;
                                float: right;
                            }
            
                            .chat_ib p {
                                font-size: 12px;
                                color: #989898;
                                margin: auto;
                                display: inline-block;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            }
            
                            .chat_img {
                                float: left;
                                width: 11%;
                            }
            
                            .chat_img img {
                                width: 100%
                            }
            
                            .chat_ib {
                                float: left;
                                padding: 0 0 0 15px;
                                width: 88%;
                            }
            
                            .chat_people {
                                overflow: hidden;
                                clear: both;
                            }
            
                            .chat_list {
                                border-bottom: 1px solid #ddd;
                                margin: 0;
                                padding: 18px 16px 10px;
                            }
            
                            .inbox_chat {
                                height: 550px;
                                overflow-y: scroll;
                            }
            
                            .active_chat {
                                background: #e8f6ff;
                            }
            
                            .incoming_msg_img {
                                display: inline-block;
                                width: 6%;
                            }
            
                            .incoming_msg_img img {
                                width: 100%;
                            }
            
                            .received_msg {
                                display: inline-block;
                                padding: 0 0 0 10px;
                                vertical-align: top;
                                width: 92%;
                            }
            
                            .received_withd_msg p {
                                background: #ebebeb none repeat scroll 0 0;
                                border-radius: 0 15px 15px 15px;
                                color: #646464;
                                font-size: 14px;
                                margin: 0;
                                padding: 5px 10px 5px 12px;
                                width: 100%;
                            }
            
                            .time_date {
                                color: #747474;
                                display: block;
                                font-size: 12px;
                                margin: 8px 0 0;
                            }
            
                            .received_withd_msg {
                                width: 57%;
                            }
            
                            .mesgs {
                                float: left;
                                padding: 30px 15px 0 25px;
                                width: 70%;
                            }
            
                            .sent_msg p {
                                background: #0465ac;
                                border-radius: 12px 15px 15px 0;
                                font-size: 14px;
                                margin: 0;
                                color: #fff;
                                padding: 5px 10px 5px 12px;
                                width: 100%;
                            }
            
                            .outgoing_msg {
                                overflow: hidden;
                                margin: 26px 0 26px;
                            }
            
                            .sent_msg {
                                float: right;
                                width: 46%;
                            }
            
                            .input_msg_write input {
                                background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                                border: medium none;
                                color: #4c4c4c;
                                font-size: 15px;
                                min-height: 48px;
                                width: 100%;
                                outline: none;
                            }
            
                            .type_msg {
                                border-top: 1px solid #c4c4c4;
                                position: relative;
                            }
            
                            .msg_send_btn {
                                background: #05728f none repeat scroll 0 0;
                                border: none;
                                border-radius: 50%;
                                color: #fff;
                                cursor: pointer;
                                font-size: 15px;
                                height: 33px;
                                position: absolute;
                                right: 0;
                                top: 11px;
                                width: 33px;
                            }
            
                            .messaging {
                                padding: 0 0 50px 0;
                            }
            
                            .msg_history {
                                height: 516px;
                                overflow-y: auto;
                            }
                        </style>
                        <div>
            
                        </div>
                
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
