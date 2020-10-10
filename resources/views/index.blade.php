@extends('main')
@section('title', 'Главная')
@section('content')
<nav class="navbar navbar-light bg-primary">
  <a class="navbar-brand text-light" href="/">
       Управление задачами v 1.0
  </a>
</nav>
<div class="container">
  <div class="row">
    <div class="col-lg top-button-wrap">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-task-popup" >Добавить задачу</button>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    @foreach ($statuses as $key => $status)
      
      <div class="col-sm">
        <span class="badge {{$status->class}}">{{$status->title}}</span> 
        <div id="{{$status->code}}" class="task-col" data-status="{{$status->id}}">
           
        @foreach ($status->tasks as $task)
          <div id="card-item-{{$task->id}}" data-id="{{$task->id}}" data-status="{{$status->id}}" class="card card-item">
            <div class="card-body">
              <p>{{$task->created_at->toDateString()}}</p>
              <h5 contenteditable="true" id="task-title-{{$task->id}}" class="card-title task-title editable-field">{{$task->title}}</h5>
              <p contenteditable="true" id="task-description-{{$task->id}}" class="card-text task-description editable-field">{{$task->description}}</p>
              @if($task->important)<span id="task-important-{{$task->id}}" class="badge badge-danger">Срочно!</span>@endif
              <span data-id="{{$task->id}}" class="delete-btn delete-task"></span>
            </div>
          </div>
        @endforeach 
      </div>
      </div>
    @endforeach 
     
    </div>
  </div>
</div>

<div class="modal fade" id="add-task-popup" tabindex="-1" role="dialog" aria-labelledby="task-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="task-label">Добавить задачу</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="modal-status"></div>  
      <form>
        <div class="form-group">
          <label for="title">Название задачи</label>
          <input type="text" class="form-control" id="title" placeholder="">
        </div>
        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" id="status">
            @foreach ($statuses as $key => $status)
            <option value="{{$status->id}}">{{$status->title}}</option>
            @endforeach 
          </select>
        </div>
        <div class="form-group">
          <label for="important">Срочность</label>
          <select class="form-control" id="important">
            <option value="0">Нет</option>
            <option value="1">Да</option>
          </select>
        </div>
        <div class="form-group">
          <label for="desc">Описание задачи</label>
          <textarea class="form-control" id="desc" rows="3"></textarea>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button id="add-task" type="button" class="btn btn-primary">Сохранить</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>
@endsection