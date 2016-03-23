@extends('layouts.portal')

@section('content')
    <div class="mj_pagetitle2">
        <div class="mj_pagetitleimg">
            <img src="http://placehold.it/1349X316" alt="">
            <div class="mj_mainheading_overlay"></div>
        </div>
        <div class="mj_pagetitle_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mj_mainheading">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="mj_joblogo">
                                        <img src="{{ $photoUrl }}" class="img-responsive" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="mj_pageheading mj_toppadder50">
                                        <h1><span>{{  $resume->jobseeker->full_name }}</span></h1>
                                        <ul>
                                            <li>
                                                <label><i class="fa fa-map-marker"></i>
                                                </label><a href="#">{{  $resume->jobseeker->address }}</a>
                                            </li>
                                            <li>
                                                <label><i class="fa fa-phone"></i>
                                                </label><a href="#">{{ $resume->jobseeker->phone }}</a>
                                            </li>
                                            <li>
                                                <label>Salario: </label><span class="mj_green_text">${{ $resume->wage_aspiration }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mj_lightgraytbg mj_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                    <div class="mj_social_media_section mj_candidatepage_media mj_toppadder40 mj_bottompadder40">
                        <ul>
                            @can('edit', $resume)
                                <li><a href="{{ route('resumes.edit', $resume) }}" class="mj_mainbtn mj_btnyellow" data-text="Editar Hoja de Vida">
                                        <span>Editar Hoja de Vida</span>
                                    </a>
                                </li>
                            @else
                                <li><a href="contact.html" class="mj_mainbtn mj_btnblue" data-text="Contactar"><span>Contactar</span></a>
                                </li>
                                <li><a href="#" class="mj_mainbtn mj_btnred" data-text="Bookmark this Resume"><span>Bookmark this Resume</span></a>
                                </li>
                            @endcan
                        </ul>
                        <p><a target="_blank" href="{{ $resumeFileUrl }}"><i class="fa fa-2x fa-download"></i></a>
                        </p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mj_postdiv mj_jobdetail mj_toppadder50 mj_bottompadder50">
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Perfil</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        {!! $resume->profile !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Habilidades</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="mj_detaildiv">
                                        <ul class="mj_selected_content">
                                            @foreach($resume->skills as $resume)
                                                <li>
                                                    <a href="#"> <i class="fa fa-check"></i> {{ $skill->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. </p>
                                        <ul>
                                            <li>Time honoured communication, leadership and academic traits strengthened through Product Assistant position and work presentations</li>
                                            <li>Used Visual Studio on unix systems to implement real time BlackBerry algorithms</li>
                                            <li>Thorough presentation, problem solving and leadership skills improved through Product Assistant position and project work</li>
                                            <li>Participated in a team that used CSS, mobile platforms and Oracle Server to improve Web Service technologies for heuristic Windows systems</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Educación</label>
                                </div>
                                @foreach($resume->studies as $study)
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <div class="mj_detaildiv">
                                            <span>{{ $study->institution }}</span>
                                            <blockquote class="mj_blueblockquote">
                                                <span><i class="fa fa-calendar"></i> {{ $study->dateRange }}</span>
                                                <h5>{{ $study->name }}</h5>
                                                <p>{{ $study->description }}</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_toppadder30 mj_bottompadder30">
                                    <div class="mj_divider"></div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <label>Experiencia</label>
                                </div>
                                @foreach($resume->experiences as $experience)
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <div class="mj_detaildiv mj_bottompadder30">
                                            <span>{{ $experience->company }}</span>
                                            <blockquote class="mj_yellowblockquote">
                                                <span><i class="fa fa-calendar"></i> {{ $experience->dateRange }}</span>
                                                <h5>{{ $experience->name }}</h5>
                                                <p>{{ $experience->description }}</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mj_bottompadder30">
                    <div class="mj_about_section mj_toppadder80 mj_bottompadder80">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                                <h1>A<span>bout</span> C<span>andidate</span></h1>
                                <p>Envato is a bootstrapped Australian company that operates an ecosystem of sites with a global community. We’re passionate about the web, and about enabling creators to make a living doing what they love. At Envato, we make websites that help people from all over the world change the way they earn and learn online.</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-link"></i> Website</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-facebook"></i>facebook</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i>dribbble</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection