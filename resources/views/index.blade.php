<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    {{-- conatiner start --}}
<div class="container py-3">
    @if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="table-responsive">
    {{-- table start --}}
    <table class="table table-bordered">
        <tr>
            <th>vehicle_id</th>
            <th>Vehicle_name</th>
            <th>price</th>
            <th>fuel_capacity</th>
            <th>milage</th>
            <th>Distance</th>
            <th>Operation</th>
        </tr>
        @foreach ($vehicle as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->fuel_capacity}}</td>
            <td>{{$item->milage}}</td>
            <td>{{$item->fuel_capacity/$item->milage}}</td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId1{{$item->id}}">
                  update
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Vehical Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <form action="{{route('vehicles.update',$item->id)}}" method="post">
                                @csrf
                                @method('put')
                            <div class="modal-body">
                                <div class="form-group">
                                  <label for="">Vehical Name</label>
                                  <input type="text" name="name" id="" class="form-control" placeholder="Enter Vehical Name" aria-describedby="helpId" value="{{$item->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="">price</label>
                                    <input type="text" name="price" id="" class="form-control" placeholder="Enter Vehical price" aria-describedby="helpId" value="{{$item->price}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="">fuel_capcity</label>
                                    <input type="text" name="fuel_capacity" id="" class="form-control" placeholder="Enter Vehical fuel_capacity" aria-describedby="helpId" value="{{$item->fuel_capacity}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="">milage</label>
                                    <input type="text" name="milage" id="" class="form-control" placeholder="Enter Vehical milage" aria-describedby="helpId" value="{{$item->milage}}">
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId2{{$item->id}}">
                   Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="modelId2{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Delete Vehical Details</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                              </div>
                              <form action="{{route('vehicles.destroy',$item->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="">Vehical Name</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Vehical Name" aria-describedby="helpId" value="{{$item->name}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="">price</label>
                                      <input type="text" name="price" id="" class="form-control" placeholder="Enter Vehical price" aria-describedby="helpId" value="{{$item->price}}">
                                    </div>
                                    <div class="form-group">
                                      <label for="">fuel_capcity</label>
                                      <input type="text" name="fuel_capacity" id="" class="form-control" placeholder="Enter Vehical fuel_capacity" aria-describedby="helpId" value="{{$item->fuel_capacity}}">
                                    </div>
                                    <div class="form-group">
                                      <label for="">milage</label>
                                      <input type="text" name="milage" id="" class="form-control" placeholder="Enter Vehical milage" aria-describedby="helpId" value="{{$item->milage}}">
                                    </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                          </form>
                          </div>
                      </div>
                  </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
{{-- conatiner end --}}
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
