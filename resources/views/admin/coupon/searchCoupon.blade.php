@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.coupon.create')}}">Thêm mới</a>
        </div>
        <h4 class="mb-1 mt-0">Danh sách</h4>
    </div>
    <div class="col-md-12">
       <form role="form" action="{{url('admin/searchCoupon')}}" method="get"  enctype="multipart/form-data">   
           <div id="datatable-buttons_filter" class="dataTables_filter" sytle="position:relative">
            <div style="position: absolute;top: 5px;left: 16px;">
                <button type="submit" class="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </div>
            <input type="search" id="search" class="form-control form-control-sm" name="keyword" value="{{$keyword}}" placeholder="Tìm kiếm theo mã" aria-controls="datatable-buttons" style= "height:35px; width: 400px;padding-left: 35px;"></div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã giảm giá</th>
                                <th>Giảm theo tiền (vnđ)</th>
                                <th>Giảm theo $</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $item)
                            <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                <td>{{ ++$key }}</td>
                                <td>{{$item->code}}</td>
                                <td>
                                    {{ $item->value }}
                                </td>
                                <td>{{ $item->percent }}</td>
                                <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="{{route('admin.coupon.edit', ['id'=> $item->id ])}}">Sửa</a>
                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'coupon')">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($data->hasPages())
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin">
                        {{ $data->links() }} {{-- nút bấm phân trang --}}
                    </ul>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection
