@extends('layouts.admin')
@section('title','Site Setting')
@section('content')
    @if (session('message'))
    <h5 class="text-center text-success">{{ session('message') }}</h5>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <form action="{{ Route('setting.store') }}" method="POST">

                @csrf

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">WebSite</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>WebSite Name</label>
                                <input type="text" name="website_name" value={{ $setting->website_name ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>WebSite URL</label>
                                <input type="text" name="website_url" value={{ $setting->website_url ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Page Title</label>
                                <input type="text" name="page_title" value={{ $setting->page_title ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control" rows="3" style="border: 2px inset lightslategray">{{ $setting->meta_keywords ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <textarea name="mata_description" class="form-control" rows="3" style="border: 2px inset lightslategray">{{ $setting->mata_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">WebSite - Information</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="3" style="border: 2px inset lightslategray">{{ $setting->address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>phone 1 *</label>
                                <input type="text" name="phone1" value={{ $setting->phone1 ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>phone No. 2</label>
                                <input type="text" name="phone2" value={{ $setting->phone2 ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Id 1*</label>
                                <input type="email" name="email1" value={{ $setting->email1 ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>phone Id 2</label>
                                <input type="email" name="email2" value={{ $setting->email2 ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">WebSite SocialMedia</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook (Optional)</label>
                                <input type="text" name="facebook" value={{ $setting->facebook ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter (Optional)</label>
                                <input type="text" name="twitter" value={{ $setting->twitter ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram (Optional)</label>
                                <input type="text" name="instagram" value={{ $setting->instagram ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Youtube (Optional)</label>
                                <input type="text" name="youtube" value={{ $setting->youtube ?? '' }} class="form-control" style="border: 2px inset lightslategray">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success text-white w-50">Save Setting</button>
                </div>
            </form>
        </div>
    </div>
@endsection
