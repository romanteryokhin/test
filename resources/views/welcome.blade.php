@extends('layouts.app')

@section('title-block')Комментарии@endsection

@section('content')

@foreach($data as $el)
<div class="comment">
    <div class="first-row">
        <div class="person_name">
            {{ $el->name }}
        </div>
        <div class="date_time">
            {{ $el->created_at }}
        </div>
    </div>
    <div class="comm_message">
        {{ $el->message }}
    </div>
</div>
@endforeach
<hr>
<h3>Оставить комментарий</h3>

<!-- @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif -->

<form class="comment_form" id="comment_form" name="comment" action="#comment_form" method="POST">
    @csrf
    @method('post')
    <label>Имя</label> <br>
    <input class="form-control" id="comment_name" type="text" name="name">
    <br>
    <label>Сообщение</label> <br>
    <textarea class="form-control" name="message" id="comment_message" rows="5"></textarea> <br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="button" id="sendMail" class="btn btn-light">Отправить</button>
</form>
<div id="errorMess"></div>
@endsection
