@extends('layout.admin')
@section('title', 'Form Edit Penelitian')

@section("css")
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ secure_asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ secure_asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>Tip!</h4>

            <p>Add the sidebar-collapse class to the body tag to get this layout. You should combine this option with a
                fixed layout if you have a long sidebar. Doing that will prevent your page content from getting stretched
                vertically.</p>
        </div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Data</h3>            
            </div>
            <div class="box-body">
                <!-- Start creating your amazing application! -->
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status') == 'berhasil')
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>                                
                                Data berhasil diperbarui!!
                            </div>
                        @elseif (session('status') == 'gagal')
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                Gagal memperbarui data!!
                            </div>
                        @endif
                        
                        
                        <form role="form" action='{{ secure_url("/penelitian/update/{$penelitian->id}") }}' method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <!-- /.box -->
                            <div class="box-footer">                                
                                <button type="reset" name="reset" class="btn btn-info">Reset</button>
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        <b>Form Penelitian</b>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                        <!-- <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                            <i class="fa fa-times"></i></button> -->
                                    </div>
                                    <!-- /. tools -->                                    
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">                                                                        
                                    <!-- text input -->
                                    <div class="form-group @error('penulis') has-error @enderror">
                                        <label>Nama Penulis:</label>
                                        <input name="penulis" type="text"  oninput="this.value = this.value.replace(/[^A-Za-z.,',\s]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Nama penulis" value="{{ $penelitian->penulis }}">
                                        @error('penulis')
                                            <span class="help-block">{{$message}}</span>                    
                                        @enderror
                                    </div>
                                    <!-- text input -->
                                    <div class="form-group @error('nrp') has-error @enderror">
                                        <label>NRP Penulis:</label>
                                        <input name="nrp" type="text"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  class="form-control" maxlength="12" placeholder="NRP penulis" value="{{ $penelitian->nrp }}">
                                        @error('nrp')
                                            <span class="help-block">{{$message}}</span>                    
                                        @enderror
                                    </div>

                                    <div class="form-group @error('file') has-error @enderror">
                                        <label for="file">File penelitian</label>
                                        <input type="file" name="file">                        
                                        @error('file')
                                            <span class="help-block">{{$message}}</span>                    
                                        @enderror
                                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                                    </div>                
                                    
                                    <div class="form-group @error('tahun') has-error @enderror">
                                        <label>Tahun Penelitian</label>
                        
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input id="datepicker" name="tahun" type="text" class="form-control pull-right" placeholder="Tahun penelitian" value="{{ $penelitian->tahun }}">
                                        </div>
                                        @error('tahun')
                                            <span class="help-block">{{$message}}</span>                    
                                        @enderror
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group @error('nrp') has-error @enderror">
                                        <label>Kata Kunci Penelitian:</label>
                                        <input name="kata_kunci" type="text" class="form-control" placeholder="Kata kunci penelitian" value="{{ $penelitian->kata_kunci }}">
                                        @error('kata_kunci')
                                            <span class="help-block">{{$message}}</span>                    
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        <b>Judul Penelitian</b>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                        <!-- <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                            <i class="fa fa-times"></i></button> -->
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->                                
                                <div class="box-body pad @error('judul') has-error @enderror">
                                    @error('judul')
                                        <span class="help-block">{{$message}}</span>                    
                                    @enderror
                                    <textarea id="editor2" name="judul" rows="10" cols="80">
                                        {{ $penelitian->judul }}
                                    </textarea>
                                </div>
                            </div>
                        
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        <b>Abstrak Penelitian</b>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                        <!-- <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                            <i class="fa fa-times"></i></button> -->
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad @error('abstrak') has-error @enderror">
                                    @error('abstrak')
                                        <span class="help-block">{{$message}}</span>                    
                                    @enderror
                                    <textarea id="editor1" name="abstrak" rows="10" cols="80">
                                        {{ $penelitian->abstrak }}
                                    </textarea>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection    
<!-- ./wrapper -->

@section('js')
<!-- CK Editor -->
<script src="{{ secure_asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ secure_asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ secure_asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(document).ready(function() {    
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();

        $('#datepicker').datepicker({
            autoclose: true,
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"    
        });

        $('button[name="reset"]').on('click', function() {
            $('input[name="penulis"]').attr('value', '');
            $('input[name="nrp"]').attr('value', '');
            $('input[name="file"]').html('');
            $('input[name="tahun"]').attr('value', '');
            $('input[name="kata_kunci"]').attr('value', '');
            CKEDITOR.instances['editor1'].setData('');
            CKEDITOR.instances['editor2'].setData('');
        });

        // $('#btn_form_penelitian').click(function() {
        //     // console.log($('#judul_penelitian').val());
        //     // console.log($('#tgl_penelitian').val());
        //     // console.log($('#nama_peneliti').val());
        //     // console.log(CKEDITOR.instances['editor1'].getData());

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.post(
        //         "/skripsi/store", 
        //         {
        //             judul: $('#judul_penelitian').val(),
        //             abstrak: CKEDITOR.instances['editor1'].getData(),
        //             //file: $('#file_penelitian').val(),
        //             penulis: $('#nama_peneliti').val(),
        //             nrp: $('#nrp_peneliti').val(),
        //             tahun: $('#tgl_penelitian').val()
        //         }
        //     )
        //     .done(function(response) {                
        //         //console.log($('#file_penelitian').prop('files')[0]);
        //         console.log(response);
        //         if (response) {
        //             $('.alert-success').removeClass('hide');
        //             setTimeout(function(){ 
        //                 $('.alert-success').addClass('hide');
        //             }, 15000);                   
        //         } else {
        //             $('.alert-danger').removeClass('hide');
        //             setTimeout(function(){ 
        //                 $('.alert-danger').addClass('hide');
        //             }, 15000);                   
        //         }               
        //     });
        // });
    });
        
</script>
@endsection