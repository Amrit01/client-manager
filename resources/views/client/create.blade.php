@extends('layout.master')
@section('css')
    <style type="text/css">
        .form-group.required .control-label:after {
            content:" *";
            color:red;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add new Client
        </div>
        <form method="POST" action="{{ action('ClientController@store') }}" class="form-horizontal" data-toggle="validator">
            {!! csrf_field() !!}
        <div class="panel-body">

            <div class="form-group required {{ ($errors->has('name'))?"has-error":'' }}">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                    <input name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter Client Name" required>
                    {!! $errors->first('name', '<span class="label label-danger" >:message</span >') !!}

                </div>
            </div>

            <div class="form-group required {{ ($errors->has('gender'))?"has-error":'' }}">
                <label for="gender" class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-9">
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="male" {{ (old('gender') =='male')?'checked':'' }} required> &nbsp;Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="female" {{ (old('gender') =='female')?'checked':'' }} required > &nbsp;Female
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender"  value="other" {{ (old('gender') =='other')?'checked':'' }} required> &nbsp;Other
                        </label>
                    </div>

                    {!! $errors->first('gender', '<span class="label label-danger" >:message</span >') !!}

                </div>
            </div>

            <div class="form-group required {{ ($errors->has('email'))?"has-error":'' }}">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="email" value="{{old('email')}}"  class="form-control" id="email" placeholder="Enter Client Email" required>
                    {!! $errors->first('email', '<span class="label label-danger" >:message</span >') !!}

                </div>
            </div>

            <div class="form-group required {{ ($errors->has('phone'))?"has-error":'' }}">
                <label for="phone" class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-9">
                    <input name="phone" class="form-control" value="{{old('phone')}}" id="phone" placeholder="Enter Client Phone Number" required>
                    {!! $errors->first('phone', '<span class="label label-danger" >:message</span >') !!}

                </div>
            </div>

            <div class="form-group required {{ ($errors->has('address'))?"has-error":'' }}">
                <label for="address" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">
                    <input name="address" value="{{old('address')}}" class="form-control" id="address" placeholder="Enter Client Address" required>
                </div>
            </div>

            <div class="form-group required {{ ($errors->has('nationality'))?"has-error":'' }}">
                <label for="nationality" class="col-sm-3 control-label">Nationality</label>
                <div class="col-sm-9">
                    <select name="nationality" id="nationality" class="form-control" required>
                        <option value="">Choose Nationality</option>
                        @foreach(config('nationalities') as $nationality)
                            <option value="{{ $nationality }}" {{ ($nationality == old('nationality'))?'selected':'' }}>{{ $nationality }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('nationality', '<span class="label label-danger" >:message</span >') !!}

                </div>
            </div>

            <div class="form-group required {{ ($errors->has('date_of_birth'))?"has-error":'' }}">
                <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                <div class="col-sm-9">
                    <input name="date_of_birth"  value="{{old('date_of_birth')}}"  class="form-control datepicker" id="dob" placeholder="Choose Client Date Of Birth" data-date-end-date="-10y" required>
                    {!! $errors->first('date_of_birth', '<span class="label label-danger" >:message</span >') !!}
                </div>
            </div>

            <div class="form-group required {{ ($errors->has('qualification'))?"has-error":'' }}">
                <label for="qualification" class="col-sm-3 control-label">Qualification</label>
                <div class="col-sm-9">
                    <input name="qualification" value="{{old('qualification')}}" class="form-control" id="qualification" placeholder="Enter Client Qualification" required>
                    {!! $errors->first('qualification', '<span class="label label-danger" >:message</span >') !!}
                </div>
            </div>

            <div class="form-group required {{ ($errors->has('qualification'))?"has-error":'' }}">
                <label for="preferred_contact_mode" class="col-sm-3 control-label">Preferred mode of contact</label>
                <div class="col-sm-9">
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="preferred_contact_mode" value="email" {{ (old('preferred_contact_mode') =='email')?'checked':'' }} required> &nbsp;Email
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="preferred_contact_mode" value="phone" {{ (old('preferred_contact_mode') =='phone')?'checked':'' }} required> &nbsp;Phone
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="preferred_contact_mode"  value="none" {{ (old('preferred_contact_mode') =='none')?'checked':'' }}  required> &nbsp;None
                        </label>
                    </div>

                    {!! $errors->first('preferred_contact_mode', '<span class="label label-danger" >:message</span >') !!}
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn-success btn">Save</button>
                    <a href="{{ action('ClientController@index') }}" class="btn-default btn">Cancel</a>
                    <button type="reset" class="btn-inverse btn">Reset</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection