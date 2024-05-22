@extends('layout_admin')
@Section('content_admin')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Quản trị</li>
        </ol>
    </div><!--/.row-->

    <?php
    $message= Session::get('message');
    if($message){
      echo '<span style="color:blue;">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
<style>
  th{
    text-align: center;
  }
</style>
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="col-md-8">Quản lý tài khoản</div>
                <div class="col-md-4 text-right"><a class='btn btn-info' href="{{ URL::to('/register-auth') }}"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới</a></div></div>
            
            <div class="panel-body" style="padding:0px;">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                          <tr>
                            <th>Tên user</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Địa chỉ</th>
                            <th>User</th>
                            <th>Admin</th>
                            <th style="width:30px;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($admin as $key => $user)
                            <form action="{{url('/assign-roles')}}" method="POST">
                              @csrf
                              <tr>
                                <td>{{ $user->admin_name }}</td>
                                <td>{{ $user->admin_email }} <input type="hidden" name="admin_email" value="{{ $user->admin_email }}"></td>
                                <td>{{ $user->admin_phone }}</td>
                                <td>{{ $user->admin_address }}</td>
                                <td><input type="checkbox" name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
                                <td><input type="checkbox" name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                              <td>     
                                 <input type="submit" value="Phân quyền" class="btn btn-sm btn-default">
                                <a href="{{url('/delete-user-roles/'.$user->admin_id)}}" class="btn btn-sm btn-danger" style="margin-top:5px; width:85px;">Xóa user</a>
                                
                              </td> 
                
                              </tr>
                            </form>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="col-12 text-center" id="btn-xemthem">    {{ $admin->links('pagination::bootstrap-4') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection