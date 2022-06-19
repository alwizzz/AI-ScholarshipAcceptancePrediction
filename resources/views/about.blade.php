@extends('layouts.main')

@section('content')
    <h1>{{ $title }}</h1>
    <p class="mt-3 text-justify" style="font-size: 120%">
            Scholarship Diagnostic is a web application which able to diagnose whether a student will get a scholarship from a given data.
        The diagnose result has <a href="/learning/prediction">accuracy</a> of {{ $accuracy }}.
        The diagnose process is based on a model created from AI Learning using Naive Bayes Algorithm.
        The used training dataset is taken from <a href="#">LINK DATASET</a>.
    </p>

    <h6>~ This project is created for 'Artifical Intelligent' project ~</h6>

@endsection