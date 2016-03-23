@extends('layouts.portal-breadcrumbs')

@section('breadcrumbs')
    {!! Breadcrumbs::render('companies.company', $company) !!}
@endsection

@section('content')
    <div class="col-md-5">
        <div class="mj_postdiv mj_shadow_yellow mj_postpage mj_toppadder50 mj_bottompadder10">
            <div class="mj_mainheading mj_bottompadder50">
                <h3><span> {{ $company->name }}</span></h3>
                <p> {{ $company->description }}</p>
            </div>
        </div>
        @can('edit', $company)
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4">
                <div class="mj_showmore">
                    <a href="{{ route('companies.edit', $company) }}" class="mj_showmorebtn mj_yellowbtn">Editar Empresa</a>
                </div>
            </div>
        @endcan
    </div>
    <div class="col-md-7">
        <div class="mj_jobinfo">
            <div class="col-xs-12">
                <div class="row">
                    <div class="mj_showjob">
                        <p><strong>{{ $company->jobs()->count() }}</strong> Ofertas de empleo</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mj_tabcontent mj_bottompadder80">
            <table class="table table-striped">
                @foreach($company->jobs as $job)
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
                            <h4><a href="{{ route('companies.jobs.edit', [$company, $job]) }}">{{ $job->name }}</a></h4>
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
        </div>
    </div>
@endsection