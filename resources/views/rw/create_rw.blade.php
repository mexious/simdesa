@extends('base.basetemplate')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Informasi RW
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kependudukan</a></li>
        <li><a href="#">Wilayah</a></li>
        <li><a href="#">RW</a></li>
        <li class="active">Input baru</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input RW Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/wilayah/rw/create">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Dusun</label>
                  <select class="form-control select2" name="rw_dusun_id" style="width: 100%;">
                    @foreach($dusuns as $dusun)
                      <option value="{{ $dusun->id }}">{{ $dusun->dusun_nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama RW</label>
                  <input type="text" class="form-control" name="rw_nama" id="exampleInputEmail1" placeholder="Masukkan Nama RW">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Ketua RW</label>
                  <input type="text" class="form-control" name="rw_ketua_nama" id="search_text" placeholder="Nama kepada dusun">
                  <input type="hidden" name="rw_ketua_id" id="q" value="">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
              </div>
            </form>
          </div>
        </section>
  <!-- /.content -->
</div>
@endsection

@section('private-css')
<!-- Select2 -->
<link rel="stylesheet" href="/assets/plugins/select2/select2.min.css">
@endsection

@section('content-css')
<!-- Daterange picker -->
<link rel="stylesheet" href="/assets/dist/css/jquery.ui.autocomplete.css">
@endsection

@section('content-js')
<!-- Select2 -->
<script src="/assets/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });

  src = "{{ route('searchdusun') }}";
   $("#search_text").autocomplete({
      source: function(request, response) {
          $.ajax({
              url: src,
              dataType: "json",
              data: {
                  term : request.term
              },
              success: function(data) {
                  response(data);
              }
          });
      },
      min_length: 3,
      select: function(event, ui) {
        //alert(ui.item.id);
        $('#q').val(ui.item.id);
      }
  });
</script>
@endsection
