<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý học sinh</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3">QUẢN LÝ HỌC SINH</h2>
        <hr>
        <div class="row mb-3">
            <div class="col-md-3">
                <a href="{{ route('add') }}"> <button class="btn btn-danger">Thêm mới</button></a>
            </div>
            <div class="col-md-3">
                <label for="displayCount">Hiển thị</label>
                <select id="displayCount" class="form-control">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="search">Tìm kiếm:</label>
                <input type="text" id="search" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-primary">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">TÊN</th>
                            <th scope="col">SỐ ĐIỆN THOẠI</th>
                            <th scope="col">SỬA</th>
                            <th scope="col">XÓA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!@empty($students))
                            @foreach ($students as $student)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->phoneNumber }}</td>
                                    <td><a href="{{ route('edit', ['id' => $student->id]) }}" class="btn btn-secondary">Sửa</a></td>
                                    <td><a onclick="return confirm('Bạn có chắc muốn xóa')" href="{{ route('delete', ['id' => $student->id]) }}" class="btn btn-danger btn-sm">Xóa</a></td>
                                </tr>
                            @endforeach
                        @else
                            <td>Người dùng không tồn tại</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Hiển thị nút phân trang -->
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Nút "Trang trước" -->
                    <li class="page-item {{ ($students->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $students->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Trang trước</a>
                    </li>

                    <!-- Các nút số trang -->
                    @for ($i = 1; $i <= $students->lastPage(); $i++)
                        <li class="page-item {{ ($i == $students->currentPage()) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $students->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Nút "Trang tiếp theo" -->
                    <li class="page-item {{ ($students->currentPage() == $students->lastPage()) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $students->nextPageUrl() }}">Trang tiếp theo</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>
