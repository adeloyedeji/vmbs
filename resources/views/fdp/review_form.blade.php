<form action="{{url('fdp/review')}}/{{$fdp->id}}" method="POST">
  
  {{ csrf_field() }}

  <div class="example-wrap" id="name">
    <h4 class="example-title">FDP Name</h4>
    <input type="text" class="form-control" value="{{$fdp->name}}" disabled="">
  </div>

  <input type="hidden" name="name" value="{{$fdp->name}}">

  <div class="example-wrap m-sm-0 hide" id="stage">
    <h4 class="example-title">FDP Stage</h4>
    <div class="form-group">
      <select class="form-control" name="level" required="">
        @foreach($data['levels'] as $level)
          <option value="{{$level->id}}" {{$fdp->level == $level->id ? 'selected' : ''}} >{{$level->level}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-group hide" id="cost_template_link">
    <a href="{{asset('sample_files')}}/costtemplate.xlsx">Download cost template here.</a>
  </div>

  <div class="example-wrap hide" id="up_cost_template">
    <h4 class="example-title">Upload Cost Template</h4>
    <div class="form-group">
      <div class="input-group input-group-file" data-plugin="inputGroupFile">
        <input type="text" class="form-control" readonly="">
        <span class="input-group-btn">
          <span class="btn btn-success btn-file waves-effect">
            <i class="icon md-upload" aria-hidden="true"></i>
            <input type="file" name="cost_template" required="">
          </span>
        </span>
      </div>
    </div>
  </div>

  <div class="example-wrap m-sm-0 hide" id="type">
    <h4 class="example-title">Type</h4>
    <div class="form-group">
      <select class="form-control" name="type" required="">
        @foreach($data['types'] as $type)
          <option value="{{$type->id}}" {{$fdp->type == $type->id ? 'selected' : ''}} >{{$type->type}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="example-wrap m-sm-0 hide" id="terrain">
    <h4 class="example-title">Terrain</h4>
    <div class="form-group">
      <select class="form-control" name="terrain" required="">
        @foreach($data['terrains'] as $terrain)
          <option value="{{$terrain->id}}" {{$fdp->terrain == $terrain->id ? 'selected' : ''}} >{{$terrain->name}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="example-wrap hide" id="up_fdp">
    <h4 class="example-title">Upload FDP</h4>
    <div class="form-group">
      <div class="input-group input-group-file" data-plugin="inputGroupFile">
        <input type="text" class="form-control" readonly="">
        <span class="input-group-btn">
          <span class="btn btn-success btn-file waves-effect">
            <i class="icon md-upload" aria-hidden="true"></i>
            <input type="file" name="fdp" required="">
          </span>
        </span>
      </div>
    </div>
  </div>

  <div class="form-group hide">
    <button type="submit" class="btn btn-primary">Submit FDP</button>
  </div>

</form>


  
<script type="text/javascript">
  
  $(function(){

      $('#stage').change(function(){

        if ($(this).val() != ""){
          $('#cost_template_link').removeClass('hide');
          $('#up_cost_template').removeClass('hide');
        }

      });

      $('up_cost_template').change(function (){
       var fileName = $(this).val();
       var validExtensions = ['xlsx'];

        var ext = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(ext, validExtensions) == -1){
           alert("Invalid file type, please select a valid excel file!");
        } else {
          $('#type').removeClass('hide');
          $('#terrain').removeClass('hide');
          $('#up_fdp').removeClass('hide');
        }
     });

      $('#up_fdp').change(function(){

        if ($(this).val() != ""){
          $('#submit').removeClass('hide');
        }

      });

  });

</script>