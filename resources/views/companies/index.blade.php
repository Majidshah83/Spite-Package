@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Companies</h2>
            </div>
            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Product</a>

            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
             <th>Image</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($companies as $comp)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{$comp->name }}</td>
	        <td style="padding: 5px"><img src="{{asset('uploads/conpany/'.$comp->picture)}}" style="width: 100%; height:100px;object-fit:cover;
}"  alt=""> </td>
            <td>{{$comp->detail}}</td>
	        <td>
                <form action="{{ route('companies.destroy',$comp->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('companies.show',$comp->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('companies.edit',$comp->id) }}">Edit</a>



                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!!$companies->links() !!}


@endsection
