@extends('layouts.admin')

@section('content')


    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-example" class="">Edit статьи</h3>
            <form action="{{ route('admin.category.update', compact('category')) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label >Название</label>
                    <input type="text" name="name" class="form-control"  value="{{$category->name}}">
                </div>
                @if($category->img)
                    <img src="{{asset($category->img)}}" alt="">
                @endif
                <div class="form-group">
                    <label >Изображение </label>
                    <input type="file" name="image" class="form-control"  >
                </div>

                <div class="form-group">
                    <label >Родительская категория </label>
                    <select name="parent_id" class="form-control">
                        <option value="0" selected> Нет родителя</option>
                        @foreach($categories as $parentCategory)
                            <option value="{{$parentCategory->id}}" {{$parentCategory->id ==$category->parent_id ?'selected':''}}>{{$parentCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection
