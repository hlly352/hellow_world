@extends('layout.admins')

@section('title',$title)

@section('content')
@if(session('success'))
	<div class="alert alert-success" role="alert">
    	{{session('success')}}   
	</div>
@endif
@if(session('error'))
    <div class="alert alert-danger" role="alert">
    	{{session('error')}}   
	</div>
@endif
		<div class="col-lg-10">
    <div class="card">
        <div class="card-header">
        	<strong class="fa fa-plus-square"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;{{$title}}</font></font></strong>
    	</div>
        <form action="/admin/article/type/{{{$rs->id}}}" method="post" class="form-horizontal">
        	<div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="text-input" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">类名</font></font></label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="请输入类名" class="form-control" value="{{$rs->name}}"></div>
                </div>
              	<div class="row form-group">
                                        <div class="col col-md-2" style="text-align:center"><label class=" form-control-label">状态</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" id="inline-radio1" name="status" value="0" class="form-check-input" {{$rs->status==0?'checked':''}}>开启
                                                </label>
                                                &nbsp;&nbsp;
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" id="inline-radio2" name="status" value="1" class="form-check-input" {{$rs->status==1?'checked':''}}>禁用
                                                </label>
                                               
                                            </div>
                                        </div>
                                    </div>	
               
                
                
                
        	</div>
	        <div class="card-footer">
	        {{csrf_field()}}
	        {{method_field('PUT')}}
	        	<input class="btn btn-outline-info" type="submit" value="修改" style="margin-left: 172px">
	       
	     
	        </div>
        </form>
    </div>
</div>

@stop
@section('js')
	<script>
		$('.alert').delay(2000).fadeOut(1500);
	</script>
@endsection