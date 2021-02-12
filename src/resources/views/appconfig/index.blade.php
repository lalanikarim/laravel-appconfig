@extends('appconfig::layouts.main')

@section('content')
  <h4>Application Configuration Override</h4>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">Config</th>
      <th scope="col">Value</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <form action="{{ route('store-config') }}" method="post">@csrf
        <td><input type="text" name="config"></td>
        <td><textarea name="value" cols="30" rows="3"></textarea></td>
        <td><button class="btn btn-primary" type="submit">Save</button></td>
      </form>
      <td></td>
    </tr>
    @php
    $i = 0;
    @endphp
    @foreach($appConfigs as $appConfig)
      <tr>
        <form action="{{ route('store-config') }}" method="post">@csrf
        <td><input type="text" name="config" maxlength="191" value="{{$appConfig->config}}"></td>
        <td><textarea name="value" cols="30" rows="3">{{$appConfig->value}}</textarea></td>
        <td>
          <button class="btn btn-primary" type="submit">Save</button>
        </td>
        </form>
        <td>
          @php
          $i++;
          @endphp
          <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{$i}}">Delete</button>
          @include('appconfig::modals.confirm',['modal_id'=> "delete{$i}",'title' => 'Confirm Config','body' => "Are you sure you want to delete this config: {$appConfig->config}?", 'link' => route('destroy-config',$appConfig->config), 'action' => 'Delete'])
        </td>
      </tr>
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
  </table>

@endsection
