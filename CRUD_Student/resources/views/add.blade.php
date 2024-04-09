<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<div class='row'>
    <div class="col-3"></div>
    <div class="col-6">
        <form action="{{route('post-add')}}" method='post'>
            <label for="">Tên</label>
            <input type="text" class="form-control" name="name">
            @error('name')  
                <span style="color: red;">{{$message}}</span>
            @enderror
            <div class="p-2"></div>
            <label for="">Số điện thoại</label>
            <input type="text" class="form-control" name="phoneNumber">
            @error('phoneNumber')  
                <span style="color: red;">{{$message}}</span>
            @enderror
            @csrf
            <hr>
            <button type="submit" class='btn btn-primary'>Thêm</button>
            <a href="{{route('index')}}" class='btn btn-danger'>Quay lại</a>
        </form>
    </div>
    <div class="col-3"></div>
</div>