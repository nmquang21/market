@section('title')
    Liên Hệ
    @endsection

<!-- page wapper-->
<div class="columns-container">
    <div class="container wapper-page" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{asset('homepage')}}" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Liên hệ</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Liên hệ với chúng tôi</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-sm-6">
                    <form action="contact-us" method="POST"  class="contact-form-box">
                        {{csrf_field()}}
                        <div class="form-selector">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Tên *"  required />
                            </div>
                        </div>
                        <div class="form-selector">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email *"  required />
                            </div>
                        </div>
                        <div class="form-selector">
                            <div class="form-group ">
                                <input type="text" name="title" class="form-control" placeholder="Tiêu đề *"  />
                            </div>
                        </div>
                        <div class="form-selector">
                            <div class="form-group">
                                <textarea name="message" class="form-control"  style="height: 100px" placeholder="Nội dung*" required></textarea>
                            </div>
                        </div>
                        <div class="form-selector">
                            <button id="btn-send-contact" class="btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6" id="contact_form_map">
                    <h3 class="page-subheading">Thông Tin</h3>
                    <p>Lorem ipsum dolor sit amet onsectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Mauris tincidunt aliquam lectus sed vestibulum. Vestibulum bibendum suscipit mattis.</p>
                    <br/>
                    <ul>
                        <li>Praesent nec tincidunt turpis.</li>
                        <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                        <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                    </ul>
                    <br/>
                    <ul class="store_info">
                        <li><i class="fa fa-home"></i>Our business address is 1063 Freelon Street San Francisco, CA 95108</li>
                        <li><i class="fa fa-phone"></i><span>+ 021.343.7575</span></li>
                        <li><i class="fa fa-phone"></i><span>+ 020.566.6666</span></li>
                        <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:%73%75%70%70%6f%72%74@%6b%75%74%65%74%68%65%6d%65.%63%6f%6d">support@kutetheme.com</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->
