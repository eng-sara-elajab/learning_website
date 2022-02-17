@extends('layouts.user')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Panel -<span style="opacity: 0.8; margin-left: 10px">Chats -</span><span style="opacity: 0.6; margin-left: 10px">One_Chat</span></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid row">
            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1" style="background-color: lightgrey; border: solid 1px darkgrey; margin-bottom: 8%; margin-top: 70px">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 one-chat-owner" style="margin: 20px auto">
                    <a href="#">{{$chat_admin->name}}</a>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 one-chat-container" id="scrolldiv">
                    <div class="row">
                        @foreach($messages as $message)
                            @if($message->sender_id == Auth::user()->id && $message->sender_type == 'user')
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2 left-side-chat">
                                    @if($chat_user->profile_photo == null)
                                        <img class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0ZL7it9GAAc4a1Fb40d6fxu-paaRZ-zG2yQ&usqp=CAU">
                                    @else
                                        <img class="img-circle" src="{{asset('images/profiles/'.$chat_user->profile_photo)}}">
                                    @endif
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8" style="background-color: whitesmoke; text-align: left">
                                    @if($message->file == null)
                                        <div class="left-side-chat-body">
                                            <p>{{$message->body}}</p>
                                        </div>
                                    @else
                                        @if($message->file_type == null)
                                            <div class="left-side-chat-body">
                                                <img src="{{asset('files/'.$message->file)}}">
                                                <p>{{$message->body}}</p>
                                            </div>
                                        @elseif($message->file_type == "docx" || $message->file_type == "pdf")
                                            <div class="left-side-chat-body">
                                                <p>{{$message->body}}<a href="{{route("view_file", $message->id)}}" type="btn btn-default" target="_blank" title="Click to view file" style="display: block">{{$message->file}}</a></p>
                                            </div>
                                        @endif
                                    @endif
                                    <em class="pull-right" style="color: black; font-size: 12px; opacity: 0.9">{{$message->created_at->format("Y/m/d H:i")}}</em>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="opacity: 0; font-size: 1px">
                                    <p>Test text Test text Test text Test text Test text Test text Test text Test text </p>
                                </div>
                            @else
                                <div class="col-xl-8 offset-xl-3 col-lg-8 offset-lg-3 col-md-8 offset-md-3 col-sm-8 offset-sm-3 col-8 offset-2" style="background-color: whitesmoke; text-align: right">
                                    @if($message->file == null)
                                        <div class="right-side-chat-body">
                                            <p>{{$message->body}}</p>
                                        </div>
                                    @else
                                        @if($message->file_type == null)
                                            <div class="right-side-chat-body">
                                                <img src="{{asset('files/'.$message->file)}}">
                                                <p>{{$message->body}}</p>
                                            </div>
                                        @elseif($message->file_type == "docx" || $message->file_type == "pdf")
                                            <div class="right-side-chat-body">
                                                <p>{{$message->body}}<a href="{{route("view_file", $message->id)}}" type="btn btn-default" target="_blank" title="Click to view file" style="display: block">{{$message->file}}</a></p>
                                            </div>
                                        @endif
                                    @endif
                                    <em class="pull-right" style="color: black; font-size: 12px; opacity: 0.9">{{$message->created_at->format("Y/m/d H:i")}}</em>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2 right-side-chat">
                                    @if($chat_admin->profile_photo == null)
                                        <img class="img-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0ZL7it9GAAc4a1Fb40d6fxu-paaRZ-zG2yQ&usqp=CAU">
                                    @else
                                        <img class="img-circle" src="{{asset('images/profiles/'.$chat_admin->profile_photo)}}">
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="opacity: 0; font-size: 1px">
                                    <p>Test text Test text Test text Test text Test text Test text Test text Test text </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <form action="{{route('message_reply')}}" method="post" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row input-field" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="room_id" value="{{$message->chat_room}}">
                    <input type="hidden" name="user_id" value="{{$chat_user->id}}">
                    <input type="hidden" name="admin_id" value="{{$chat_admin->id}}">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ90pkWZxBCfZnEB-BmKM6bVd59wXCHhwfpBA&usqp=CAU" id="upfile1" title="Select file to upload" style="cursor:pointer" />
                    <input type="text" name="" id="file2" class="display_file_name col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1" readonly>
                    <input type="file" id="file1" class="btn btn-default btn-sm col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1" name="file" onchange="myChangeFunction(this)">
                    <textarea class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-8" name="body" placeholder="Reply here" required></textarea>
                    <button type="submit" class="btn btn-success col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2"><i class="fab fa-telegram-plane"></i></button>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <p style="color: darkred; text-align: center; font-size: 16px">Only images, pdf, microsoft word files are allowed..</p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection