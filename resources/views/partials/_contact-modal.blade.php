
  <div class="modal-fade-screen">
    <div class="modal-inner">
      <div class="modal-close" for="contact-modal"><i class="fa fa-times" aria-hidden="true"></i></div>
      <section class="form_contact">
            <form role="form" class="small" method="POST" action="/contact/send">
                {{ csrf_field() }}

                <h2>Contact Us</h2>

                <p>Contact us by email at <a href="mailto:client@fluxcredit.com">Client@fluxcredit.com</a>, call us at 866.FLUX.218 (866-358-9218) or fill out the form below.</a></p>

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
  </div>
