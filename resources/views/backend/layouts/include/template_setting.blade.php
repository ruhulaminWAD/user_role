
{{-- Rightbar Menu Or Template Settings --}}

<div id="rightbar" class="rightbar">
    <ul class="nav nav-tabs-new">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting">Settings</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Choose Theme</h6>
                    <ul class="choose-skin list-unstyled mb-0">
                        <li data-theme="purple">
                            <div class="purple"></div>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                        </li>
                        <li data-theme="orange" class="active">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled mb-0">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Report Panel Usag</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Email Redirect</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Notifications</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Auto Updates</span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <h6>Account Settings</h6>
                    <ul class="setting-list list-unstyled mb-0">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Offline</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Location Permission</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Notifications</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane right_chat" id="chat">
            <div class="slim_scroll">
                <form>
                    <div class="input-group m-b-20">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <div class="card">
                    <h6>Recent</h6>
                    <ul class="right_chat list-unstyled mb-0">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar4.jpg"
                                        alt="">
                                    <div class="media-body">
                                        <span class="name">Ava Alexander <small class="float-right">Just
                                                now</small></span>
                                        <span class="message">Lorem ipsum Veniam aliquip culpa laboris minim
                                            tempor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar5.jpg"
                                        alt="">
                                    <div class="media-body">
                                        <span class="name">Debra Stewart <small class="float-right">38min
                                                ago</small></span>
                                        <span class="message">Many desktop publishing packages and web page
                                            editors</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar2.jpg"
                                        alt="">
                                    <div class="media-body">
                                        <span class="name">Susie Willis <small class="float-right">2hr
                                                ago</small></span>
                                        <span class="message">Contrary to belief, Lorem Ipsum is not simply
                                            random text</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar1.jpg"
                                        alt="">
                                    <div class="media-body">
                                        <span class="name">Folisise Chosielie <small class="float-right">2hr
                                                ago</small></span>
                                        <span class="message">There are many of passages of available, but the
                                            majority</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar3.jpg"
                                        alt="">
                                    <div class="media-body">
                                        <span class="name">Marshall Nichols <small class="float-right">1day
                                                ago</small></span>
                                        <span class="message">It is a long fact that a reader will be
                                            distracted</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
