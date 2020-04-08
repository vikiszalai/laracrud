@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <a href="" data-toggle="modal" id="addProduct" data-target="#mainModal"
                    class="btn btn-primary pull-right">@lang("msg.addprod") </a>
                <h2 id="msg_title">@lang("msg.htitle")</h2>
                @if(count($products) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>@lang("msg.title")</th>
                            <th>@lang("msg.price")</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{number_format($product->price,0)}} Ft</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a class="btn btn-success edit" style="color:white;" data-toggle="modal"
                                    data-target="#mainModal" data-id="{{$product->id}}" data-title="{{$product->title}}"
                                    data-body="{{$product->body}}" data-price="{{$product->price}}"
                                    data-image="{{$product->image}}" data-tags="{{$product->tags}}"
                                    data-active_from="{{$product->active_from}}"
                                    data-active_to="{{$product->active_to}}">@lang("msg.edit")</a>
                                <a class="btn btn-danger delete" data-id="{{$product->id}}"
                                    style="color:white;">@lang("msg.delete")</a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @else
                <p>@lang("msg.noproducts")</p>
                @endif
            </div>

        </div>
    </div>
</div>

@endsection