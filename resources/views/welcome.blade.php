@extends('layouts.app')

@section('title-block')Комментарии@endsection

@section('content')
<h3>Оставить комментарий</h3>
<form class="comment_form" id="comment_form" name="comment" action="#comment_form" method="POST">
    @csrf
    @method('post')
    <label>Имя</label> <br>
    <input class="form-control" id="comment_name" type="text" name="name">
    <br>
    <label>Сообщение</label> <br>
    <textarea class="form-control" name="message" id="comment_message" rows="5"></textarea> <br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="button" id="sendMail" class="btn btn-success">Отправить</button>
</form>
<div id="errorMess"></div>
@endsection
