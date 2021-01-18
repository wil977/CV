@extends('layouts.template')

@section('contenu')
<div id="colorlib-page">
    <div class="container-wrap">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapsed" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
            <div class="text-center" style="margin-top: -20px;">
                <div class="author-img img-thumbnail" style="background-image: url(images/about4.jpg);"></div>
                <h1 id="colorlib-logo"><a href="{{url('/dashboard')}}">TCHOMTCHOUA TIAM<br>WILFRID ISRAEL</a></h1>
                <span class="position">INFORMATICIEN</span>
            </div>
            <nav id="colorlib-main-menu" role="navigation" class="navbar">
                <div id="navbar" class="collapse">
                    <ul>
                        <li class="active"><a href="#" data-nav-section="home">Acceuil</a></li>
                        <li><a href="#" data-nav-section="about">à propos de moi</a></li>
                        <li><a href="#" data-nav-section="services">Services à vous offrir</a></li>
                        <li><a href="#" data-nav-section="skills">Mes compétences</a></li>
                        <li><a href="#" data-nav-section="education">Mon éducation</a></li>
                        <li><a href="#" data-nav-section="experience">Mes expériences</a></li>
                        <!-- <li><a href="#" data-nav-section="work">Work</a></li> -->
                        <!-- <li><a href="#" data-nav-section="blog">Blog</a></li> -->
                        <li><a href="#" data-nav-section="contact">Contact</a></li>
                    </ul>
                </div>
            </nav>

            <div class="colorlib-footer">
                {{-- <ul>
          <li><a href="https://"><i class="icon-facebook2"></i></a></li>
          <li><a href="fichier/Naza feat. Dj Leska - Vodka (Clip Officiel).mp4"><i class="icon-twitter2"></i></a></li>
          <li><a href="#"><i class="icon-instagram"></i></a></li>
          <li><a href="https://www.linkedin.com/in/wilfried-tiam-835a48198"><i class="icon-linkedin2"></i></a></li>
        </ul> --}}
                <p><small>
                        Copyright &copy; TiamWilfrid <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </small></p>
            </div>

        </aside>

        <div id="colorlib-main">
            <section id="colorlib-hero" class="js-fullheight" data-section="home">
                <div class="flexslider js-fullheight">
                    <ul class="slides">
                        <li style="background-image: url(images/img_bg_1.jpg);">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                                        <div class="slider-text-inner js-fullheight">
                                            <div class="desc">
                                                <h1>Je <br> suis <br>Concepteur</h1>
                                                <p><a class="btn btn-primary btn-learn" href="{{route('downloadcv')}}">Télécharger le CV <i class="icon-download4"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li style="background-image: url(images/img_bg_6.jpg);">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                                        <div class="slider-text-inner">
                                            <div class="desc" style="">
                                                <h1 style="color: white;">Je <br> suis <br>Dévelopeur</h1>
                                                <p><a class="btn btn-primary btn-learn" style="color: white; border-color: white;" href="{{route('downloadcv')}}">Télécharger le CV <i class="icon-download4"></i></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            {{-- Section à propos --}}
            <section class="colorlib-about" data-section="about">
                <div class="colorlib-narrow-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
                                <div class="col-md-12">
                                    <div class="about-desc">
                                        <span class="heading-meta">A propos de moi</span>
                                        <h2 class="colorlib-heading">Qui suis je?</h2>
                                        <p class="text-justify">
                                            @if ($propos!=null)
                                            {{$propos->commentaire}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section expertises --}}
            <section class="colorlib-services" data-section="services" style="margin-top: -180px;">
                <div class="colorlib-narrow-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                            <span class="heading-meta">Qu'es ce que je fais ?</span>
                            <h2 class="colorlib-heading">Là vous avez les différents service que je peux offrir.</h2>
                        </div>
                    </div>
                    <div class="row row-pt-md">
                        @if (count($expertises)>0)
                        @foreach ($expertises as $exp)
                        <div class="col-md-4 text-center animate-box">
                            <div class="services color-{{$exp->couleur}}">
                                <span class="icon">
                                    <i class="{{$exp->icon}}"></i>
                                </span>
                                <div class="desc">
                                    <h3>{{$exp->titre}}</h3>
                                    <p>{{$exp->contenu}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </section>

            <div id="colorlib-counter" class="colorlib-counters" style="background-image: url(images/cover_bg_1.jpg);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="colorlib-narrow-content">
                    <div class="row center">

                        @if ($stat!=null)

                        <div class="col-md-4 text-center animate-box">
                            <span class="colorlib-counter js-counter" data-from="0" data-to="{{$stat->tasse}}" data-speed="2000" data-refresh-interval="50"></span>
                            <span class="colorlib-counter-label">Tasse de Thé</span>
                        </div>
                        <div class="col-md-4 text-center animate-box">
                            <span class="colorlib-counter js-counter" data-from="0" data-to="{{$stat->projet}}" data-speed="2000" data-refresh-interval="50"></span>
                            <span class="colorlib-counter-label">Projets</span>
                        </div>
                        <div class="col-md-3 text-center animate-box">
                            <span class="colorlib-counter js-counter" data-from="0" data-to="{{$stat->client}}" data-speed="2000" data-refresh-interval="50"></span>
                            <span class="colorlib-counter-label">Clients</span>
                        </div>

                        @endif

                    </div>
                </div>
            </div>

            {{-- section mes compétences --}}
            <section class="colorlib-skills" data-section="skills">
                <div class="colorlib-narrow-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                            <span class="heading-meta">Ma Spécialité</span>
                            <h2 class="colorlib-heading animate-box">Mes Compétences</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                            <p>OK!!!!!!! Bienvenue dans la section "MES COMPETENCES". Dans les lignes qui suivent, vous avez un bref appercu de mes différentes compétences.</p>
                        </div>
                        @if (count($competences)>0)
                        @foreach ($competences as $comp)
                        <div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
                            <div class="progress-wrap">
                                <h3>{{$comp->name}}</h3>
                                <div class="progress">
                                    <div class="progress-bar color-{{$comp->colors}}" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:{{$comp->width}}%">
                                        <span>{{$comp->width}}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </section>

            {{-- section mon éducation --}}
            <section class="colorlib-education" data-section="education" style="margin-top: -100px;">
                <div class="colorlib-narrow-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                            <span class="heading-meta">Education</span>
                            <h2 class="colorlib-heading animate-box">historique de mes diplôme j'usqu'a présent</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                            <div class="fancy-collapse-panel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @php
                                    $compt = 0
                                    @endphp
                                    @if (count($educations)>0)
                                    @foreach ($educations as $edu)
                                    @php
                                    $compt = $compt + 1
                                    @endphp
                                    @if ($compt == 1)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="{{$edu->heading}}">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#{{$edu->colapse}}" aria-expanded="true" aria-controls="{{$edu->colapse}}">{{$edu->entete}}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="{{$edu->colapse}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="{{$edu->heading}}">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>{{$edu->contenu}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="{{$edu->heading}}">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#{{$edu->colapse}}" aria-expanded="false" aria-controls="{{$edu->colapse}}">{{$edu->entete}}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="{{$edu->colapse}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{$edu->heading}}">
                                            <div class="panel-body">
                                                <p>{{$edu->contenu}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- section mes expériences --}}
            <section class="colorlib-experience" style="margin-top:-200px;" data-section="experience">
                <div class="colorlib-narrow-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                            <span class="heading-meta">Experience</span>
                            <h2 class="colorlib-heading animate-box">Exprrience professionnelle</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="timeline-centered">
                                @if (count($experiences)>0)
                                @foreach ($experiences as $exp)
                                <article class="timeline-entry animate-box" data-animate-effect="fadeInRight">
                                    <div class="timeline-entry-inner">
                                        <div class="timeline-icon color-{{$exp->color}}">
                                            <i class="icon-pen2"></i>
                                        </div>
                                        <div class="timeline-label">
                                            <h2>{{$exp->titre}} <span>
                                                    @php
                                                    echo "<br>$exp->annee";
                                                    @endphp
                                                </span></h2>
                                            <p class="text-justify">
                                                @php
                                                echo "$exp->contenu";
                                                @endphp</p>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="colorlib-contact" style="margin-top:-200px;" data-section="contact" id="con">
                <div class="colorlib-narrow-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                            <span class="heading-meta">Prenez Contact Avec Moi</span>
                            <h2 class="colorlib-heading">Contact</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon">
                                    <i class="icon-globe-outline"></i>
                                </div>
                                <div class="colorlib-text">
                                    @if ($contact!=null)
                                    <p><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p>
                                    @endif
                                </div>
                            </div>

                            <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon">
                                    <i class="icon-map"></i>
                                </div>
                                <div class="colorlib-text">
                                    @if ($contact!=null)
                                    <p>{{$contact->adresse}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                                <div class="colorlib-icon">
                                    <i class="icon-phone"></i>
                                </div>
                                <div class="colorlib-text">
                                    @if ($contact!=null)
                                    <p><a href="tel:{{$contact->tel}}">{{$contact->tel}}</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-md-push-1">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInRight">
                                    <form action="{!! route('Savemessage') !!}" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input required="" type="text" class="form-control" placeholder="Nom" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" class="form-control" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" class="form-control" placeholder="Object" name="subject">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" required="" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-send-message" value="Envoyer le message">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div style="height:250px;">

            </div>



        </div>
    </div>
</div>
@endsection