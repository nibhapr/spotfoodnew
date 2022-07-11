                    <div class="row mx-4">
                    @foreach ($sections as $section)
                        @forelse (isset($section['cities'])?$section['cities']:[] as $city)
                            <?php $link=route('show.stores',['city'=>$city->alias]); ?>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="strip strip_city">
                                    <figure>

                                        <a href="{{ $link }}"><img src="{{ $city->logo }}" data-src="{{ config('global.restorant_details_image') }}" class="img-fluid lazy" alt=""></a>

                                        <span class="city_title mt--1"><b><a class="text-white" href="{{ $link }}">{{ $city->name}}</a></b></span><br />
                                        <a href="{{ $link }}" class="city_letter mt--1 text-red fade-in">{{ $city->alias}}</a>
                                    </figure>

                                </div>
                            </div>
                            @empty
                            <div class="col-md-12">
                            <p class="text-muted mb-0">{{ __('Hmmm... Nothing found!')}}</p>
                            </div>

                        @endforelse
                    @endforeach
                    </div>