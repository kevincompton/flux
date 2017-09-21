@extends('layouts.client')

@section('content')
    <div class="wrapper page_wrap">

        <section class="form_contact">
            <form role="form" class="small" method="POST" action="/contact/send">
                {{ csrf_field() }}

                @if(!Auth::user())
                    <input name="email" type="text" placeholder="Your email">
                    <input name="name" type="text" placeholder="Your Name">
                @endif

                <textarea rows="4" name="message" placeholder="Your message..."></textarea>

                <div class="actions">
                    <button type="submit">Send</button>
                </div>

            </form>
        </section>
        
    </div>
@endsection
