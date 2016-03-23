@extends('layouts.portal')

@section('content')

    <div class="mj_mapmarker">
        <div id="map"> </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mj_top_searchbox">
                        <form>
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Category">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <select name="timepass" class="custom-select">
                                    <option>All Regions</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <select name="timepass" class="custom-select">
                                    <option>Country</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <a href="#" class="mj_mainbtn mj_btnyellow" data-text="search"><span>search</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mj_filter_section">
        <div class="container">
            <div class="row">
                <div class="mj_filter_slider">
                    <form>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="form-group">
                                    <label>Experience:<span>0 to 4 Years</span>
                                    </label>
                                    <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="form-group">
                                    <label>salary:<span> $21.000 - $80.000</span>
                                    </label>
                                    <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mj_check_filter">
                    <form class="form-inline">
                        @foreach($types as $type)
                            <div class="form-group">
                                <div class="mj_checkbox">
                                    <input type="checkbox" value="{{ $type->id }}" id="check-{{ $type->id }}" name="checkbox">
                                    <label for="check-{{ $type->id }}"></label>
                                </div>
                                <span> {{ $type->name }}</span> 
                            </div>
                        @endforeach
                    </form>
                </div>
                <div class="mj_jobinfo">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="row">
                            <div class="mj_showjob">
                                <p>Actualmente <strong>{{ $jobs->count() }}</strong> ofertas de trabajo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="row">
                            <div class="mj_rss_feed">
                                <p>RSS <i class="fa fa-rss"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mj_tabcontent mj_bottompadder80">
                    <table class="table table-striped">
                        @foreach($jobs as $job)
                            <tr>
                                <td>
                                    <div class="mj_liks"><a href="#"><i class="fa fa-heart"></i></a><span>Save this Job</span>
                                    </div>
                                </td>
                                <td>
                                    <a href="#"><img src="http://placehold.it/70X70" class="img-responsive" alt="">
                                    </a>
                                </td>
                                <td>
                                    <h4><a href="job_detail.html">{{ $job->name }}</a></h4>
                                    <p>{{ $job->company->name }}</p>
                                </td>
                                <td><i class="fa fa-map-marker"></i>
                                    <P>New York City</P>
                                </td>
                                <td><a href="#" class="mj_btn mj_greenbtn">{{ $job->contractType->name }}</a>
                                </td>
                                <td><span>$45,000</span>
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4">
                        <div class="mj_showmore"> <a href="#" class="mj_showmorebtn mj_blackbtn">Show More</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
