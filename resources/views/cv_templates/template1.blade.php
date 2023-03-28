@extends('layouts.main')

@section('page_head')
    @vite(['resources/scss/template1.scss'])
@endsection


@section('content')
    <div id="template1" class="card card-body mt-4">
        <div class="border-bottom pb-4">
            @hasSection('general')
                @yield('general')
            @endif
        </div>
        <div class="row">
            <div class="col-4 col-lg-3 col-md-3 border-end pt-4">
                @hasSection('personal_infor')
                    @yield('personal_infor')
                @endif

                @hasSection('contract')
                    @yield('contract')
                @endif
                
                @hasSection('technology_skill')
                    @yield('technology_skill')
                @endif
                
                @hasSection('language')
                    @yield('language')
                @endif
            </div>
            <div class="col-8 col-lg-9 col-md-9 pt-4">
                @hasSection('summary_infor')
                    @yield('summary_infor')
                @endif
                
                @hasSection('objective')
                    @yield('objective')
                @endif
               
                @hasSection('experience')
                    @yield('experience')
                @endif
                
                @hasSection('education_history')
                    @yield('education_history')
                @endif

                @hasSection('employment_history')
                    @yield('employment_history')
                @endif
            </div>
        </div>
    </div>
@endsection