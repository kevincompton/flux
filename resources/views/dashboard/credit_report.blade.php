@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')
      
    <div class="panel">
      <div class="panel-body">
        <h3 class="title-hero">
          Upload Your Credit Report
        </h3>
        <div class="example-box-wrapper">
          
          <form role="form" class="form-horizontal bordered-row" method="POST" action="/credit-report/upload" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group copy">
                <label for="file">Upload Files (you may choose multiple)</label><br>
                <small>*Feel free to upload as a png, jpg or pdf.</small>
                <input type="file" id="file" name="file[]" multiple>
              </div>

              <div class="form-group text-right">
                <button class="btn btn-lg btn-primary" type="submit">Upload Credit Report</button>
              </div>

          </form>

        </div>
        
      </div>
    </div>

@endsection