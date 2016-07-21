@extends('layouts.master')

@section('content')
    <div class="container" id="faq">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    @if(!empty($faqs))
                        <ol class="faq-list">
                            @foreach($faqs as $faq)
                                <li>
                                    <a href="#{{ $faq->id }}">{{ $faq->question }}</a>
                                </li>
                            @endforeach
                        </ol>

                        <ul class="list-group">
                            @foreach($faqs as $faq)
                                <li class="list-group-item"  id="{{ $faq->id }}">
                                    <h3 class="list-group-item-heading">{{ $faq->question }}</h3>
                                    <p class="list-group-item-text">{!! Markdown::convertToHtml($faq->answer) !!}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection