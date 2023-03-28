@extends('layouts.main')

<?php 
    $contractItem = file_get_contents(resource_path('views/pages/admin/cv_setting/parts/contract_item.blade.php'));
?>

@section('page_head')
    @vite(['resources/scss/cv_setting_page.scss'])
    <script src="{{asset('js/common.js')}}"></script>
    <script src="{{asset('js/cv_setting_page.js')}}"></script>
    <script>
        const baseUrl = '{{asset("")}}';
        const contractItem = `{!! $contractItem !!}`;
        const listIconsURL = "{{route('admin.get_list_icons')}}"
    </script>
@endsection

@section('bottom_script')
    <script type="text/javascript">
        $(document).ready(function(){
            
            $('#contract-add').off('click').on('click', function () {
                ContractSetting.addNewContractItem(contractItem);

                // when add new contract item , expand card body to show list
                const ArrowToggleElm = $(this).siblings('.arrow-toggle');
                const isShow = ArrowToggleElm.attr('show-body') == 'true' ? true : false;
                if (!isShow) {
                    ArrowToggleElm.click();
                }
            })

            $('.arrow-toggle').each(function(index) {
                $(this).off('click').on('click', function() {
                    const isShow = $(this).attr('show-body') == 'true' ? true : false;
                    $(this).attr('show-body', !isShow);
                    
                    const cardBody = $(this).closest('.card-header').siblings('.card-body');
                    if (!isShow) {
                        cardBody.addClass('show');
                    } else {
                        cardBody.removeClass('show');
                    }
                })
            })

            $( ".contract__list" ).sortable();

            
        });
    </script>
@endsection

@section('content')
    <div id="cv-setting-page">
        <h1 class="text-center">CV Settings</h1>
        
        <form action="" method="POST">
            <div id="contract" class="card contract-container">
                <div class="d-flex align-items-center card-header">
                    <h4 class="mb-0">Contract Settings</h4>
                    <p class="mb-0 ms-auto me-2">Display on CV</p>
                    <div class="form-check form-switch">
                        <input name="show-contract" class="form-check-input switch-size-lg" type="checkbox">
                    </div>
                    <button id="contract-add" class="btn btn-primary ms-2" type="button">Add New Item</button>
                    <div class="arrow-toggle pointer ms-3" show-body="false"></div>
                </div>
                <div class="card-body contract__list">
                    
                </div>
            </div>
        </form>
    </div>

    @include('pages.admin.cv_setting.modals.choose_icon_modal')
@endsection