@extends('cv_templates.template1')

@section('general')
    @include('cv_templates.template_parts.general')
@endsection

@section('personal_infor')
    @include('cv_templates.template_parts.personal_infor')
@endsection

@section('contract')
    @include('cv_templates.template_parts.contract')
@endsection

@section('technology_skill')
    @include('cv_templates.template_parts.technology_skill')
@endsection

@section('language')
    @include('cv_templates.template_parts.language')
@endsection

@section('summary_infor')
    @include('cv_templates.template_parts.summary_infor')
@endsection

@section('objective')
    @include('cv_templates.template_parts.objective')
@endsection

@section('experience')
    @include('cv_templates.template_parts.experience')
@endsection

@section('education_history')
    @include('cv_templates.template_parts.education_history')
@endsection

@section('employment_history')
    @include('cv_templates.template_parts.employment_history')
@endsection